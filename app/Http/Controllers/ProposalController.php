<?php

namespace opinion\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use opinion\Comment;
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


    public function storeComment(Request $request, $id)
    {


        $validator = Validator::make($request->all(), [
            'newComment'    => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('proposal_show_path')
                ->withErrors($validator)
                ->withInput();
        }

        $comment = new Comment;
        $comment->Comment=$request->newComment;
        $comment->Author_id=$request->user()->id;
        $comment->Proposal_id=$request->id;
        $comment->save();

        return redirect()->route('proposal_show_path', $id);

    }



    public function editProposal($id)
    {
        $proposal = proposal::findOrFail($id);
        return view('proposal.edit', ['proposal' => $proposal]);
    }

    public function update(Request $request, $id){


        $proposal = proposal::findOrFail($id);
        $proposal->title = $request->get('title');
        $proposal->body = $request->get('body');
        $proposal->save();

        return redirect()->route('proposal_show_path', $proposal->id);
    }

    public function deleteProposal($id)
    {

        $proposal = proposal::findOrFail($id);
        $proposal->delete();
        return redirect()->route('user_show_path');


    }

}
