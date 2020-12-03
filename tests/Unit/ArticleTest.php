<?php

declare(strict_types = 1);

namespace App\Tests\Unit;

use App\Entity\Article;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class ArticleTest extends TestCase {

    private $article;

    protected function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        // inisialiser l'objet User
        $this->article =new Article();
    }

    public function assertInstOf($var):void
    {
        self::assertInstanceOf(Article::class, $var);
    }

    public function testGetName(): void
    {
        $value='supper name great test';
        $article=$this->article->setName($value);

        $this->assertInstOf($article);
        self::assertEquals($value,$this->article->getName());

    }

    public function testContent(): void
    {
        $value='supper Content great test';
        $article=$this->article->setContent($value);

        $this->assertInstOf($article);
        self::assertEquals($value,$this->article->getContent());

    }

    public function testGetAuthor():void
    {
        $value =new User();
        $article=$this->article->setAuthor($value);
        $this->assertInstOf($article);
        self::assertInstanceOf(User::class,$this->article->getAuthor());


    }
}