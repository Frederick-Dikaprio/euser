<?php

namespace Tests\Unit;

use Exception;
use PHPUnit\Framework\TestCase;
use App\Utils\ElasticSearchFormatter;
use Illuminate\Http\Request;

class ElasticSearchFormatterTest extends TestCase
{
    protected ElasticSearchFormatter $elasticSearchFormatter;

    public function setUp(): void
    {
        parent::setUp();
        $this->elasticSearchFormatter = new ElasticSearchFormatter();
    }

    protected function getHttpRequest(array $data = [])
    {
        $request = $this->createMock(Request::class);
        $request->expects($this->once())
            ->method('getMethod')
            ->willReturn($data['method'] ?? null);

        $request->expects($this->once())
            ->method('getUri')
            ->willReturn($data['uri'] ?? null);

        return fn () => $request;
    }

    public function testGivenGetRequestWhenFormatThenReceiveJsonObject()
    {
        $data = [
            'method' => 'GET',
            'uri' => 'http://tata.titi',
            'message' => 'Ceci est un test',
            'payload' => [
                "alias" => 'poupy',
                "ip" => '127.0.0.1',
                "password" => "**********"
            ],
        ];

        $record = [
            'context' => [
                'exception' => new Exception($data['message'])
            ]
        ];

        app()->singleton('request', $this->getHttpRequest($data));

        $format = $this->elasticSearchFormatter->format($record);

        $this->assertStringNotContainsString(PHP_EOL, $format);
        $response = json_decode($format, true);

        $this->assertIsArray($response);
        $this->assertEquals($data['message'], $response['message']);
        $this->assertEquals($data['method'], $response['method']);
        $this->assertEquals(['full' => $data['uri']], $response['url']);
        $this->assertStringNotContainsString("<br>", $response['stacktrace']);
        $this->assertTrue(
            (bool) preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}\.\d{3}$/', $response['date'])
        );
    }
}
