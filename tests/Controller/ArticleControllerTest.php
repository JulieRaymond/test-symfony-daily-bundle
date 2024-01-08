<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticleControllerTest extends WebTestCase
{
    public function testRecentArticlesPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/recent-articles');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Recent articles');
    }

    public function testCommentForm(): void
    {
        $client = static::createClient();

        // Assurez-vous que la route /articles/1 existe
        $client->request('GET', '/articles/1');
        $this->assertResponseIsSuccessful();

        // Sélectionnez le bouton de soumission du formulaire comment_submit
        $crawler = $client->request('GET', '/articles/1');
        $form = $crawler->selectButton('comment_submit')->form();

        // Simulez l'envoi du formulaire avec un commentaire de test
        $client->submit($form, [
            'comment[content]' => 'This is a test comment.',
        ]);

        // Suivez la redirection
        $client->followRedirect();

        // Vérifiez que la page affiche bien le commentaire envoyé
        $this->assertSelectorTextContains('ul#comments li', 'This is a test comment.');
    }
}
