<?php

/*
 * This file is part of the RunroomSamplesBundle.
 *
 * (c) Runroom <runroom@runroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Runroom\SamplesBundle\Tests\Forms\Unit;

use PHPUnit\Framework\TestCase;
use Runroom\SamplesBundle\Core\Service\FormHandler;
use Runroom\SamplesBundle\Core\ViewModel\FormAwareInterface;
use Runroom\SamplesBundle\Forms\Form\Type\ContactFormType;
use Runroom\SamplesBundle\Forms\Service\ContactService;

class ContactServiceTest extends TestCase
{
    protected $repository;
    protected $handler;
    protected $service;

    protected function setUp(): void
    {
        $this->handler = $this->prophesize(FormHandler::class);

        $this->service = new ContactService(
            $this->handler->reveal()
        );
    }

    /**
     * @test
     */
    public function itGeneratesDemoViewModel()
    {
        $formAware = $this->prophesize(FormAwareInterface::class);

        $this->handler->handleForm(ContactFormType::class)
            ->willReturn($formAware->reveal());

        $model = $this->service->getContactForm();

        $this->assertInstanceOf(FormAwareInterface::class, $model);
    }
}
