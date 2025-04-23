<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Review;
use App\Utils\Util;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function addContact(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'subject' => 'required',
                'message' => 'required',
                'contact' => 'required|min:10|max:10',
                'email' => 'required|email',
            ]);
            if ($validator->fails()) {
                return Util::getErrorMessage('Validation Failed', $validator->errors());
            }
            $contact = new Contact();
            $contact->subject = $request->subject;
            $contact->email = $request->email;
            $contact->contact = $request->contact;
            $contact->message = $request->message;
            $contact->save();

            return Util::getSuccessMessage('Contact Added Successfully', $contact);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function viewFaqs(Request $request)
    {
        try {
            $language = Auth::user()->default_language;
            $faqEnglishFields = ['*', 'question as displayQuestion', 'answer as displayAnswer'];
            $faqGujaratiFields = ['*', 'questionGuj as displayQuestion', 'answerGuj as displayAnswer'];
            $faqHindiFields = ['*', 'questionHin as displayQuestion', 'answerHin as displayAnswer'];

            $currentPage = $request->input('page', 1);
            $faqs = Faq::where('status', 'active')
                ->select($language == 'Hindi' ? $faqHindiFields : ($language == 'Gujarati' ? $faqGujaratiFields : $faqEnglishFields))
                ->paginate($request->input('limit', 10), ['*'], 'page', $currentPage);

            return Util::getSuccessMessage('Faqs', $faqs);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function review(Request $request)
    {
        try {
            $reviews = Review::where('product_id', $request->product_id)
                ->get();
            return Util::getSuccessMessage('Reviews', $reviews);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    public function addReview(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'product_id' => 'required',
                'star' => 'required',
                'message' => 'required',
            ]);
            if ($validator->fails()) {
                return Util::getErrorMessage('Validation Failed', $validator->errors());
            }
            $review = new Review();
            $review->product_id = $request->product_id;
            $review->user_id = Auth::user()->id;
            $review->star = $request->star;
            $review->message = $request->message;
            $review->rev_date = now();
            $review->save();

            return Util::getSuccessMessage('Review Added Successfully', $review);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }

    public function updateReview(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'product_id' => 'required',
                'star' => 'required',
                'message' => 'required',
            ]);
            if ($validator->fails()) {
                return Util::getErrorMessage('Validation Failed', $validator->errors());
            }
            $review = Review::find($id);
            $review->product_id = $request->product_id;
            $review->user_id = Auth::user()->id;
            $review->star = $request->star;
            $review->message = $request->message;
            $review->rev_data = $review->rev_date;
            $review->save();

            return Util::getSuccessMessage('Review Updated Successfully', $review);
        } catch (Exception $e) {
            return Util::getErrorMessage('Something went wrong', ['error' => $e->getMessage()]);
        }
    }
}
