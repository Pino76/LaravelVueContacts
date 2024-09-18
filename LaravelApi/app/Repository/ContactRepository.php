<?php

namespace App\Repository;

use App\DTO\ContactDTO;
use App\Interfaces\IContactRepository;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

class ContactRepository implements IContactRepository
{
    public function getAll(): ?Collection{
        return Contact::all();
    }
    public function getById($idContact): ?Contact{
        return Contact::find($idContact);
    }
    public function save(ContactDTO $contactDTO): Contact
    {
        $contactArray = $contactDTO->toArray();
        return Contact::updateOrCreate(["id" => $contactDTO->getId()], $contactArray);
    }
    public function delete($idContact):int
    {
        $contact = Contact::where("id", $idContact);
        $countContact = $contact->count();
        if($countContact > 0){
            $contact->delete();
        }
        return $countContact;
    }
}
