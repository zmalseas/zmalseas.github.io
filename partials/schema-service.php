<?php
/**
 * Service Page Schema Markup Generator
 * 
 * Usage: include this file with $serviceData array defined
 * 
 * Example:
 * $serviceData = [
 *   'name' => 'Λογιστική Εταιρειών',
 *   'description' => 'Full description...',
 *   'url' => 'https://nerally.gr/ipiresies/logistiki.php',
 *   'serviceType' => 'Accounting',
 *   'provider' => 'Nerally',
 *   'areaServed' => 'GR',
 *   'price' => 'Contact for pricing'
 * ];
 */

if (!isset($serviceData)) {
    return;
}

$schema = [
    '@context' => 'https://schema.org',
    '@type' => 'Service',
    'serviceType' => $serviceData['serviceType'] ?? 'Professional Service',
    'name' => $serviceData['name'] ?? '',
    'description' => $serviceData['description'] ?? '',
    'url' => $serviceData['url'] ?? '',
    'provider' => [
        '@type' => 'Organization',
        'name' => 'Nerally',
        'url' => 'https://nerally.gr',
        'logo' => 'https://nerally.gr/images/logo.png',
        'sameAs' => [
            'https://www.linkedin.com/company/nerally',
            'https://www.instagram.com/nerally_co/',
            'https://www.tiktok.com/@nerally_co'
        ],
        'contactPoint' => [
            '@type' => 'ContactPoint',
            'telephone' => '+30-694-636-5798',
            'contactType' => 'customer service',
            'availableLanguage' => 'Greek'
        ]
    ],
    'areaServed' => [
        '@type' => 'Country',
        'name' => 'Greece'
    ],
    'availableChannel' => [
        '@type' => 'ServiceChannel',
        'serviceUrl' => 'https://nerally.gr/epikoinonia/contact.php'
    ]
];

// Add optional fields if provided
if (isset($serviceData['offers'])) {
    $schema['offers'] = $serviceData['offers'];
}

if (isset($serviceData['aggregateRating'])) {
    $schema['aggregateRating'] = $serviceData['aggregateRating'];
}

echo '<script type="application/ld+json">' . "\n";
echo json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
echo "\n" . '</script>' . "\n";
?>
