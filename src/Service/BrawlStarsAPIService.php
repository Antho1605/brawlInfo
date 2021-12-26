<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class BrawlStarsAPIService {
    private $bsApi;

    public function __construct(HttpClientInterface $bsApi)
    {
        $this->bsApi = $bsApi;
    }

    public function fetchBrawlersInformation(): array
    {
        $response = $this->bsApi->request(
            'GET',
            'https://api.brawlstars.com/v1/brawlers', 
            [
                'auth_bearer' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImQ0OThkOTI4LTFhN2QtNDI3Ny1hOTQ2LWE0ZWJiMmMzYzA2ZiIsImlhdCI6MTY0MDM1ODUwNiwic3ViIjoiZGV2ZWxvcGVyLzY4ZjM3OTc2LWE0MzQtODhjOS02N2RiLTU4MmI0MGUxNWRkOSIsInNjb3BlcyI6WyJicmF3bHN0YXJzIl0sImxpbWl0cyI6W3sidGllciI6ImRldmVsb3Blci9zaWx2ZXIiLCJ0eXBlIjoidGhyb3R0bGluZyJ9LHsiY2lkcnMiOlsiMTQ5LjE1NC4yMDguMTk4Il0sInR5cGUiOiJjbGllbnQifV19.aGnXiECZBjY1UBS1quM6jAG_yiB_8JkZXv_8HYFvdp9aInbkBeyjrr7y1iComi3-CVYCFrVJ1pE0eSRmO7nDmQ'
            ]
            
        );

        $statusCode = $response->getStatusCode();
        // $statusCode = 200
        $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
    }
}