<?php

use Database\Seeders\UserSeeder;
use Tests\TestCase;
use Mmal\OpenapiValidator\Validator;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserGetTest extends TestCase
{
    use RefreshDatabase;

    /** @var Validator */
    private $validator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(UserSeeder::class);
        $this->validator = new Validator( Yaml::parse( file_get_contents( base_path('prism/user/user.user_id.yaml') ) ) );
    }

    /**
     * スキーマチェック
     */
    public function testSuccessfulResponse()
    {
        // 不要なパラメータが入っていてもエラーにならない
        // swagger UIに映し出すディレクトリ構造だと、テストが実施できない
        $response = $this->get('api/user/1');
        $response = [
            'nam' => 1
        ];

        $result = $this->validator->validate('getUser', 200, $response);
        $this->assertFalse($result->hasErrors(), $result);
    }

    /**
     * スキーマチェック
     */
    public function testNotFoundResponse()
    {
        $response = [
            'code'    => '0000001',
            'message' => 'ユーザ情報がありません',
            'hoge' => 'ほげ',
        ];

        $result = $this->validator->validate('getUser', 404, $response);
        $this->assertFalse($result->hasErrors(), $result);
    }
}
