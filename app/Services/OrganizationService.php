<?php 

namespace App\Services;

use App\Models\Organization;

class OrganizationService extends Service {

    public function createOrganization($request) {
        return Organization::create($request->validated());
    }

    public function updateOrganization($request, $organization) {
        return $organization->update($request->validated());
    }

    public function deleteOrganization($organization) {
        $organization->delete();
    }

}