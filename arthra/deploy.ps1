# Nerally WordPress Blog Deployment Script (PowerShell)
# Χρήση: .\deploy.ps1

Write-Host "🚀 Nerally WordPress Blog Deployment" -ForegroundColor Cyan
Write-Host "==================================" -ForegroundColor Cyan

# Check if WordPress core files exist
if (-Not (Test-Path "wp-blog-header.php")) {
    Write-Host "❌ WordPress core files not found!" -ForegroundColor Red
    Write-Host "📥 Please download WordPress core files first:" -ForegroundColor Yellow
    Write-Host "   1. Go to https://wordpress.org/download/" -ForegroundColor White
    Write-Host "   2. Download latest WordPress" -ForegroundColor White  
    Write-Host "   3. Extract to this directory" -ForegroundColor White
    Write-Host "   4. Run this script again" -ForegroundColor White
    exit 1
}

# Create wp-config.php if it doesn't exist
if (-Not (Test-Path "wp-config.php")) {
    Write-Host "📝 Creating wp-config.php from sample..." -ForegroundColor Yellow
    Copy-Item "wp-config-sample.php" "wp-config.php"
    Write-Host "⚠️ Remember to edit wp-config.php with your database settings!" -ForegroundColor Yellow
}

# Create uploads directory if it doesn't exist
if (-Not (Test-Path "wp-content\uploads")) {
    Write-Host "📁 Creating uploads directory..." -ForegroundColor Green
    New-Item -ItemType Directory -Path "wp-content\uploads" -Force | Out-Null
}

# Check theme files
if (-Not (Test-Path "wp-content\themes\nerally-theme")) {
    Write-Host "❌ Nerally theme not found!" -ForegroundColor Red
    exit 1
} else {
    Write-Host "✅ Nerally theme found" -ForegroundColor Green
}

# Validate .htaccess
if (-Not (Test-Path ".htaccess")) {
    Write-Host "⚠️ .htaccess not found - WordPress permalinks may not work" -ForegroundColor Yellow
} else {
    Write-Host "✅ .htaccess found" -ForegroundColor Green
}

Write-Host ""
Write-Host "✅ Deployment preparation complete!" -ForegroundColor Green
Write-Host ""
Write-Host "📋 Next steps:" -ForegroundColor Cyan
Write-Host "1. Upload all files to your hosting server" -ForegroundColor White
Write-Host "2. Create MySQL database 'nerally_blog'" -ForegroundColor White
Write-Host "3. Edit wp-config.php with database credentials" -ForegroundColor White
Write-Host "4. Visit https://yourdomain.com/arthra/wp-admin/install.php" -ForegroundColor White
Write-Host "5. Activate the 'Nerally Blog Theme'" -ForegroundColor White
Write-Host ""
Write-Host "📚 For detailed instructions, see INSTALLATION_GUIDE.md" -ForegroundColor Cyan