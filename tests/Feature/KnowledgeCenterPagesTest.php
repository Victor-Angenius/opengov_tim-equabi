<?php

namespace Tests\Feature;

use Tests\TestCase;

class KnowledgeCenterPagesTest extends TestCase
{
    public function test_education_page_is_accessible(): void
    {
        $response = $this->get(route('education'));

        $response->assertOk();
        $response->assertSee('Pusat Edukasi Warga');
        $response->assertSee('Hak Warga');
    }

    public function test_service_guide_page_is_accessible(): void
    {
        $response = $this->get(route('service-guide'));

        $response->assertOk();
        $response->assertSee('Panduan Layanan');
        $response->assertSee('Administrasi Kependudukan');
    }
}
