$root = Resolve-Path ..\
$patterns = @('*.php','*.html','*.htm')
$regex = [regex]"<script[^>]*type=[\'\"][^>]*application\/ld\+json[^>]*>([\s\S]*?)<\\/script>" -Options IgnoreCase
$errors = @()
Get-ChildItem -Path $root -Recurse -Include $patterns | ForEach-Object {
    try {
        $text = Get-Content -Path $_.FullName -Raw -ErrorAction Stop
    } catch {
        return
    }
    $matches = $regex.Matches($text)
    if ($matches.Count -gt 0) {
        for ($i=0; $i -lt $matches.Count; $i++) {
            $json = $matches[$i].Groups[1].Value.Trim()
            # remove PHP tags inside JSON if any (heuristic)
            $clean = $json -replace '<\?php.*?\?>','' -replace '\n','`n'
            if (-not $clean) { continue }
            try {
                $null = $clean | ConvertFrom-Json -ErrorAction Stop
            } catch {
                $errors += [PSCustomObject]@{
                    File = $_.FullName
                    Index = $i
                    Error = $_.Exception.Message
                    Snippet = $clean.Substring(0,[Math]::Min(800,$clean.Length))
                }
            }
        }
    }
}
if ($errors.Count -eq 0) {
    Write-Host "OK: No JSON-LD parse errors found"
    exit 0
}
foreach ($e in $errors) {
    Write-Host "ERROR in $($e.File) (block #$($e.Index))"
    Write-Host "json error: $($e.Error)" -ForegroundColor Red
    Write-Host "snippet:" -ForegroundColor Yellow
    Write-Host $e.Snippet
    Write-Host "---------------------------"
}
exit 1
