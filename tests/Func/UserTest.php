<?php

declare(strict_types = 1);

namespace App\Tests\Func;

//use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Faker\Factory;

//class UserTest extends WebTestCase {
class UserTest extends AbstractEndPoint {

    private $userPayLoad= '{"email":"%s","password":"password"}';
    public function testGetUsers():void
    {
        // 1st method de test
//        $client=self::createClient();
//        $client->request(Request::METHOD_GET,'/api/users.json');
//        dd($client->getResponse());
        //
        $response= $this->getResponseFromRequest(Request::METHOD_GET,'/api/users');
        $responseContent = $response->getContent();
        $responseDecoded = json_decode($responseContent, true);

        self::assertEquals(Response::HTTP_OK,$response->getStatusCode());
        self::assertJson($responseContent );
        self::assertNotEmpty($responseDecoded);
    }

    public function testPostUser():void
    {

        $response= $this->getResponseFromRequest(
            Request::METHOD_POST,
            '/api/users',
            $this->getPayLoad()
        );
        $responseContent = $response->getContent();
        $responseDecoded = json_decode($responseContent, true);
        //dd($responseDecoded);
        self::assertEquals(Response::HTTP_CREATED,$response->getStatusCode());
        self::assertJson($responseContent );
        self::assertNotEmpty($responseDecoded);
    }

    private function getPayLoad():string
    {
        $faker=Factory::create();
        return sprintf($this->userPayLoad,$faker->email);

    }

}