<?php

namespace opinion\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use opinion\Http\Requests;
use opinion\Http\Controllers\Controller;
use opinion\proposal;

class ProposalController extends Controller
{
    public function show($id)
    {
        $proposal = proposal::findOrFail($id);

        return view('proposal', ['proposal' => $proposal]);
    }

    public function newProposal()
    {
        return view('proposal.create');

    }

    public function storeProposal(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'title'    => 'required',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('proposal_new_path')
                ->withErrors($validator)
                ->withInput();
        }

        $proposal = new proposal;
        $proposal->title=$request->title;
        $proposal->body=$request->body;
        $proposal->author_id=$request->user()->id;
        $proposal->save();

        return redirect()->route('proposal_show_path', $proposal->id);

    }

    public function editProposal($id)
    {
        $proposal = proposal::findOrFail($id);
        return view('proposal.edit', ['proposal' => $proposal]);
    }


}
