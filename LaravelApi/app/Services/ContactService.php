<?php

namespace App\Services;

use App\DTO\ContactDTO;
use App\Interfaces\IContactRepository;
use App\Interfaces\IContactService;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Spatie\FlareClient\Http\Exceptions\NotFound;

class ContactService implements IContactService
{
    private IContactRepository $contactRepository;

    public function __construct(IContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function getAllContacts(): ? Collection
    {
        return $this->contactRepository->getAll();
    }
    public function getContactById($idContact):?Contact
    {
        return $this->contactRepository->getById($idContact);
    }
    public function saveContact(ContactDTO $contactDTO): Contact
    {
        return $this->contactRepository->save($contactDTO);
    }
    public function deleteContact($idContact): int
    {
        $result = $this->contactRepository->delete($idContact);
        if($result == 0){
            throw new NotFound("Contatto non trovato");
        }
        return $result;
    }
}
