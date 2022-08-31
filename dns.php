<?php

// Cloudflare
#$dns_server = 'https://cloudflare-dns.com/dns-query';
// Google
#$dns_server = 'https://dns.google/dns-query';
// Adguard accept dns parameter
$dns_server = 'https://dns.adguard.com/dns-query';

header('Content-Type: '.$_SERVER['HTTP_ACCEPT']);

$opts = [
    'http' => [
        'method' => 'GET',
        'header' => 'Accept: '.$_SERVER['HTTP_ACCEPT']
    ]
];
$context = stream_context_create($opts);

echo file_get_contents($dns_server . '?'.$_SERVER['QUERY_STRING'], false, $context);
