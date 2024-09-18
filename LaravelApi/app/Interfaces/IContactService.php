<?php

namespace App\Interfaces;

use App\DTO\ContactDTO;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

interface IContactService
{
    public function getAllContacts(): ?Collection;
    public function getContactById(int $idContact): ?Contact;
    public function saveContact(ContactDTO $contactDTO):Contact;
    public function deleteContact($idContact):int;

}
