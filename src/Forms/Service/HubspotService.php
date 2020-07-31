<?php

namespace Runroom\SamplesBundle\Forms\Service;

use SevenShores\Hubspot\Resources\Forms;

class HubspotService
{
    protected $hubspotForms;
    protected $portalId;
    protected $formId;

    public function __construct(
        Forms $hubspotForms,
        string $portalId,
        string $formId
    )
    {
        $this->hubspotForms = $hubspotForms;
        $this->portalId = $portalId;
        $this->formId = $formId;
    }
    public function send(array $data)
    {
        $this->hubspotForms->submit($this->portalId, $this->formId, $data);
    }
}
