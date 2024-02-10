<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\AccessLevels;

class Manager extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'can_create',
        'can_edit',
        'can_delete',
        'access_level',
    ];

    /**
     * Get the user associated with the manager.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check if the user has the "owner" role.
     */
    public function isOwner(): bool
    {
        return $this->access_level === AccessLevels::OWNER;
    }

    /**
     * Check if the user has the "admin" role.
     */
    public function isAdmin(): bool
    {
        return $this->access_level === AccessLevels::ADMIN;
    }

    /**
     * Check if the user has the "manager" role.
     */
    public function isManager(): bool
    {
        return $this->access_level === AccessLevels::MANAGER;
    }

    /**
     * Set the role of the user.
     */
    public function setRole(string $role): void
    {
        $this->access_level = $role;
    }

    /**
     * Get the role of the user.
     */
    public function getRole(): string
    {
        return $this->access_level;
    }

    /**
     * Check if the user can create objects in the system.
     */
    public function canCreate(): bool
    {
        return $this->can_create;
    }

    /**
     * Check if the user can edit objects in the system.
     */
    public function canEdit(): bool
    {
        return $this->can_edit;
    }

    /**
     * Check if the user can delete objects in the system.
     */
    public function canDelete(): bool
    {
        return $this->can_delete;
    }

    /**
     * Assign a user as a manager.
     */
    public function assignUser(
        User $user,
        $access_level = AccessLevels::MANAGER,
        $create = false,
        $edit = false,
        $delete = false
    ): void {
        // Assign the user_id to the manager
        $this->user_id = $user->id;
        $this->access_level = $access_level;
        $this->can_create = $create;
        $this->can_edit = $edit;
        $this->can_delete = $delete;
        $this->save();
    }

    /**
     * Remove a user from the manager role.
     */
    public function removeUser(User $user): void
    {
        // Check if the given user is assigned as the manager
        if ($this->user_id === $user->id) {
            // Remove the user_id from the manager
            $this->user_id = null;
            $this->save();
        }
    }
}
