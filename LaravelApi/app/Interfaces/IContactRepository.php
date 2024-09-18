<?php

namespace App\Interfaces;

use App\DTO\ContactDTO;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

interface IContactRepository
{
    public function getAll():?Collection;
    public function getById($idContact): ?Contact;
    public function save(ContactDTO $contactDTO): Contact;
    public function delete($idContact):int;
}
