<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResidenceCertificateRequest;

class ResidenceController extends Controller
{
    public function residence()
    {
        return view('residence');
    }

    public function demandePost(Request $request)
    {
        // تحقق من صحة المدخلات
        $validated = $request->validate([
            'first_name_ar' => 'required|string|max:255',
            'last_name_ar' => 'required|string|max:255',
            'cnie_number' => 'required|string|max:50',
            'birth_date' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'profession' => 'required|string|max:255',
            'residence_type' => 'required|string',
            'full_address' => 'required|string|max:500',
            'postal_code' => 'nullable|string|max:20',
            'city' => 'required|string|max:100',
            'supporting_document' => 'required|file|mimes:pdf,jpg,png',
            'id_document' => 'required|file|mimes:pdf,jpg,png',
            'delivery_location' => 'required|string',
            'address_line1' => 'nullable|string|max:255',
            'address_line2' => 'nullable|string|max:255',
            'locality' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'recipient_name' => 'nullable|string|max:255',
            'recipient_email' => 'nullable|email|max:255',
            'recipient_phone' => 'nullable|string|max:20',
        ]);

        // رفع الملفات وتخزين المسارات
        $proofDocPath = $request->file('supporting_document')->store('proof_docs', 'public');
        $cinPath = $request->file('id_document')->store('cin_docs', 'public');

        // تخزين البيانات
        ResidenceCertificateRequest::create([
            'firstname' => $validated['first_name_ar'],
            'lastname' => $validated['last_name_ar'],
            'cin' => $validated['cnie_number'],
            'birthdate' => $validated['birth_date'],
            'birthplace' => $validated['birth_place'],
            'profession' => $validated['profession'],
            'residence_type' => $validated['residence_type'],
            'full_address' => $validated['full_address'],
            'postal_code' => $validated['postal_code'],
            'city' => $validated['city'],
            'proof_doc' => $validated['supporting_document'],
            'proof_doc_path' => $proofDocPath,
            'cin_path' => $cinPath,
            'fullname' => $validated['recipient_name'],
            'email' => $validated['recipient_email'],
            'phone_code' => $validated['recipient_phone'], 
            'phone_number' => $validated['recipient_phone'],
            'delivery_place' => $validated['delivery_location'],
            'first_address' => $validated['address_line1'],
            'second_address' => $validated['address_line2'],
            'country' => $validated['country'],
        ]);

         // Ajouter un message flash
        session()->flash('success', 'تم إرسال الطلب بنجاح !');
        return redirect()->route('residence');

        
        // إعادة توجيه مع رسالة نجاح
        //return redirect()->route('residence')->with('success', 'تم إرسال الطلب بنجاح!');
    }
}
