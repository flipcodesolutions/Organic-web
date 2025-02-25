<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs= Faq::where('status','active')->get();
        return view('admin.faq.index',compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'questionguj' => 'required',
            'questionhin' => 'required',
            'answer' => 'required',
            'answerguj' => 'required',
            'answerhin' => 'required',
        ]);
        $faq = new Faq();
        $faq->question = $request->question;
        $faq->questionGuj= $request->questionguj;
        $faq->questionHin= $request->questionhin;
        $faq->answer = $request->answer;
        $faq->answerGuj= $request->answerguj;
        $faq->answerHin= $request->answerhin;
        $faq->save();
        return redirect()->route('faq.index')->with('msg','Data Is Inserted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $faqs = Faq::find($id);
        return view('admin.faq.edit',compact('faqs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'question' => 'required',
            'questionguj' => 'required',
            'questionhin' => 'required',
            'answer' => 'required',
            'answerguj' => 'required',
            'answerhin' => 'required',
        ]);
        $faq = Faq::find($id);
        $faq->question = $request->question;
        $faq->questionGuj= $request->questionguj;
        $faq->questionHin= $request->questionhin;
        $faq->answer = $request->answer;
        $faq->answerGuj= $request->answerguj;
        $faq->answerHin= $request->answerhin;
        $faq->save();
        return redirect()->route('faq.index')->with('msg','Data Is Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $faq =Faq::find($id);
        $faq->status = 'deactive';
        $faq->save();

        return redirect()->back();
    }
    public function deactive()
    {
        $faqs = Faq::where('status','deactive')->get();
        return view('admin.faq.deactivedata',compact('faqs'));
    }
    public function active(string $id)
    {
        $faq =Faq::find($id);
        $faq->status = 'active';
        $faq->save();

        return redirect()->back()->with('msg','Status Is Active successfully');
    }
    public function permdelete(string $id)
    {
        $faq = Faq::find($id);
        $faq->delete();
        return redirect()->back();
    }
}

