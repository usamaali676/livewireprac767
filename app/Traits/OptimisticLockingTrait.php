<?php
// app/Traits/OptimisticLockingTrait.php

namespace App\Traits;

trait OptimisticLockingTrait
{
    public function scopeLockForUpdate($query)
    {
        return $query->lockForUpdate();
    }

    public function updateWithOptimisticLock(array $attributes = [], array $options = [])
    {
        // Increment the version column before updating
        $this->version++;

        // Set the updated version in the attributes
        $attributes['version'] = $this->version;

        // Call the parent update method
        return parent::update($attributes, $options);
    }
    public function isLocked()
    {
        return $this->locked;
    }

    public function lock()
    {
        $this->locked = true;
        $this->save();
    }

    public function unlock()
    {
        $this->locked = false;
        $this->save();
    }
}
