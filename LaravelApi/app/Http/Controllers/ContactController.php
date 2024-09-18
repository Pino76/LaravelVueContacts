<?php

namespace App\Http\Controllers;

use App\DTO\ContactDTO;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Interfaces\IContactService;
use App\Interfaces\IContactRepository;
use Illuminate\Http\JsonResponse;

class ContactController extends Controller
{
    private IContactService $contactService;
    private IContactRepository $contactRepository;


    public function __construct(IContactService $contactService, IContactRepository $contactRepository)
    {
        $this->contactService = $contactService;
        $this->contactRepository = $contactRepository;
    }
    public function contacts():JsonResponse
    {
        $contacts = $this->contactService->getAllContacts();
        return response()->json([
            "contacts" => $contacts,
            "message" => "Contacts",
            "code" => 200,
            "contactCount" => $contacts->count()
        ]);
    }

    public function getContact(int $id):JsonResponse
    {
        $contact = $this->contactService->getContactById($id);
        if(!$contact){
            return response()->json([
                "error" => "Contact not found",
                "message" => "Contacts",
                "code" => 404
            ]);
        }
        return response()->json([
            "contact" => $contact,
            "message" => "Contacts",
            "code" => 200,
            "contactCount" => $contact->count()
        ]);
    }

    public function saveContact(ContactRequest $request):JsonResponse
    {
        $this->saveContactData($request);
        return response()->json([
            "message" => "Contact Created Successfully",
            "code" => 200
        ]);
    }

    public function deleteContact($id): JsonResponse
    {
        $this->contactService->deleteContact($id);
        return response()->json([
            "message" => "Contact Deleted Successfully",
            "code" => 200
        ]);
    }

    public function updateContact(ContactRequest $request, Contact $contact)
    {
        $this->saveContactData($request, $contact);
        return response()->json([
            "message" => "Contact Updated Successfully",
            "code" => 200
        ]);
    }

    private function saveContactData(ContactRequest $request, Contact $contact = null)
    {
        $contactDTO = new ContactDTO(
            $contact?->id ?? $request->id,
            $request->name,
            $request->email,
            $request->designation,
            $request->contact_no,
        );
        $this->contactService->saveContact($contactDTO);
    }
}
