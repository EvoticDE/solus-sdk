<?php

namespace Evotic\SolusSDK;
use Illuminate\Support\Facades\Config;

/**
 * Handles Communication with SolusVM API
 */
class SolusClient {

    public static ?SolusClient $instance = null;

    public function __construct(
        private string $base_url,
        private string $token
    ) { }

    /**
     * Request data from SolusVM API
     *
     * @param string $method
     * @param string $path
     * @param ?array $data
     * @return array
     * @throws \Exception
     */
    private function request(string $method, string $path, ?array $data = null): array {

        // open curl session
        $ch = curl_init();

        $url = $this->base_url . $path;

        $header = ["Authorization: Bearer {$this->token}"];

        // write data to body and set header
        if (isset($data)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            array_push($header, 'Content-Type: application/json');
        }

        // set request options
        curl_setopt_array($ch, [
            CURLOPT_URL            => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST  => $method,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HTTPHEADER     => $header,
        ]);

        // execute request
        $response      = curl_exec($ch);
        $response_code = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);

        if (curl_errno($ch)) throw new \Exception(curl_error($ch));

        // close curl session
        curl_close($ch);

        switch ($response_code) {
            case 200:
                break;
            case 201:
                break;
            case 401:
                throw new \Exception('(http-401) authentication to SolusVM api failed');
            case 403:
                throw new \Exception('(http-403) access to SolusVM api denied (not enough permissions)');
            case 404:
                throw new \Exception('(http-404) requested resource not found');
            case 422:
                throw new \Exception('(http-422) request data validation failed (probably missing required fields)');
            default:
                throw new \Exception(json_encode([
                    'response' => $response,
                    'code'     => $response_code
                ]));
        }
        
        // return response
        return json_decode($response, true)['data'];

    }

    public function get(string $path): array {
        return $this->request('GET', $path);
    }

    public function post(string $path, ?array $data = null): array {
        return $this->request('POST', $path, $data);
    }

    public function put(string $path, ?array $data = null): array {
        return $this->request('PUT', $path, $data);
    }

    public function patch(string $path, ?array $data = null): array {
        return $this->request('PATCH', $path, $data);
    }

    public function delete(string $path): array {
        return $this->request('DELETE', $path);
    }

    public static function getInstance(): SolusClient {
        if (self::$instance === null) {
            self::$instance = new SolusClient(
                Config::get('solus.base_url'),
                Config::get('solus.token')
            );
        }
        return self::$instance;
    }

}
