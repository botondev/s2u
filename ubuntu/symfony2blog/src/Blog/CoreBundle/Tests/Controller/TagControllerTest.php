<?php

namespace Blog\CoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TagControllerTest extends WebTestCase
{
    public function testTags()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/tags');
    }

    public function testTaggedposts()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'taggedposts');
    }

}
