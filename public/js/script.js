

    function viewDeleteContext(id,type)
    {

        var modal;
        modal=document.getElementById("confirmDeleteModal");
        document.getElementById("idProposal").value=id;
        //document.getElementById("titleProposal").value=title;
        document.getElementById("deleteButton").setAttribute('onclick',"location.href='sugerencia/delete/"+id+"'");
        alert(modal.style.display);
        if(type){
            modal.style.display="inherit";
        }else{
            modal.style.display="none";
        }


    }


    function viewNewComment(id)
    {
        document.getElementById('newCommentForm').style.display="inherit";
        document.getElementById("deleteButton").setAttribute('onclick',id);

    }
