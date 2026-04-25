<?php

namespace Tests\Feature;

use App\Models\Report;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_cannot_access_admin_management_pages(): void
    {
        $user = User::factory()->create([
            'is_admin' => false,
        ]);

        $response = $this->actingAs($user)->get(route('admin.users.index'));

        $response->assertForbidden();
    }

    public function test_admin_can_create_new_admin_account(): void
    {
        $admin = User::factory()->create([
            'is_admin' => true,
        ]);

        $response = $this->actingAs($admin)->post(route('admin.users.store'), [
            'name' => 'Admin Baru',
            'email' => 'adminbaru@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseHas('users', [
            'email' => 'adminbaru@example.com',
            'is_admin' => true,
        ]);
    }

    public function test_user_can_only_view_own_report(): void
    {
        $user = User::factory()->create([
            'is_admin' => false,
        ]);
        $otherUser = User::factory()->create([
            'is_admin' => false,
        ]);

        $ownReport = Report::create([
            'user_id' => $user->id,
            'title' => 'Laporan Saya',
            'description' => 'Milik saya',
            'category' => 'Fasilitas',
            'status' => 'pending',
            'location' => 'Jakarta',
            'images' => [],
        ]);

        $otherReport = Report::create([
            'user_id' => $otherUser->id,
            'title' => 'Laporan Orang Lain',
            'description' => 'Bukan milik saya',
            'category' => 'Jalan',
            'status' => 'pending',
            'location' => 'Bandung',
            'images' => [],
        ]);

        $this->actingAs($user)
            ->get(route('reports.show', $ownReport))
            ->assertOk();

        $this->actingAs($user)
            ->get(route('reports.show', $otherReport))
            ->assertForbidden();
    }
}
