@include('js-css-help.table-style')
<script>
  function addAnswer(btn) {
    let li = document.createElement("li");
    let answerList = btn.parentElement.parentElement;
    let n_quest = answerList.id.split(" ")[1];
    let n_ans = answerList.childElementCount+1;
    let id_ans = "answer "+n_quest+" "+n_ans;
    li.className = "list-group-item";
    li.innerHTML = ""+
        "<label>"+n_ans+".&nbsp </label>"+
        "<input type=\"radio\" class=\"mx-2\" name=\"radio "+n_quest+"\" value=\""+n_ans+"\">"+
        "<input type=\"text\" id='"+id_ans+"' class='ms-1' name='"+id_ans+"'>"+
        "<button class=\"badge text-danger mx-1 border-1 bg-light \" type=\"button\" onclick=\"removeAnswer(this)\">-</button>"+
        "<button class=\"badge text-success mx-1 border-1 bg-light \" type=\"button\" onclick=\"addAnswer(this)\">+</button>"
      "";
      console.log(btn.id);
      btn.parentElement.removeChild(btn);
      
      if(answerList.childElementCount == 1){
        answerList.children[0].innerHTML +=
         "<button class=\"badge text-danger mx-1 bg-light border-1\" type=\"button\" onclick=\"removeAnswer(this)\">-</button>";
      }
      
      answerList.appendChild(li);
  }

  function removeAnswer(btn){
    const i = btn.previousElementSibling.id.split(" ")[2];
    answerOL = btn.parentElement.parentElement;
    if( i == answerOL.childElementCount){ //if this is the last answer of the current question
      answerOL.children[i-2].innerHTML += "<button class=\"badge text-success mx-1 bg-light border-1\" type=\"button\" onclick=\"addAnswer(this)\">+</button>";
    }
    answerOL.children[i-1].remove();

    if(answerOL.childElementCount == 1){
        answerOL.children[0].children[3].remove();
    }

    for(let j=1; j<=answerOL.childElementCount; j++){
      const li = answerOL.children[j-1];
      li.children[0].innerHTML = "" + j + ". ";
      li.children[1].value = j;
      input = li.children[2];
      input.name = input.id = input.id.substring(0,9) + j;
    }

  }

  function addQuestion() {
    let li = document.createElement("li");
    let questionList = document.getElementById("questions");
    let n_quest = questionList.childElementCount+1;
    let id_quest = "question "+n_quest;
    li.className = "list-group-item pb-4 mb-4";
    li.innerHTML = "" +
        "<button style=\"float: right;\" class=\"badge text-danger mt-n4 me-n2 bg-light border-1\" type=\"button\" onclick=\"removeQuestion(this)\">x</button>"+
        "<label>Question "+n_quest+"</label>" +
        "<input type=\"text\" id=\"question text "+n_quest+"\" class=\"form-control mb-4\" name=\"question text "+n_quest+"\">"+
        "<label>Answers</label>"+
          "<ol type=\"a\" id=\"answerList "+n_quest+"\">"+
            "<li class=\"list-group-item\" style=\"background-color: #dddddd\">"+
                "<label>1. </label>"+
                "<input type=\"radio\" class=\"mx-2\" name=\"radio "+n_quest+"\" value=\"1\" checked>"+
                "<input type=\"text\" id=\"answer "+n_quest+" 1\" class=\"ms-2\" name=\"answer "+n_quest+" 1\">"+
                "<button class=\"badge text-success mx-1 bg-light border-1\" type=\"button\" onclick=\"addAnswer(this)\">+</button>"+
            "</li>"+
          "</ol>";
    li.id = id_quest;

    if(questionList.childElementCount == 1){
        questionList.children[0].innerHTML = ""+
         "<button style=\"float: right;\" class=\"badge text-danger mt-n4 me-n2 bg-light border-1\" type=\"button\" onclick=\"removeQuestion(this)\">x</button>" +
         questionList.children[0].innerHTML ;
      }

    questionList.appendChild(li);
  }

  function removeQuestion(btn){
   const i = btn.parentElement.id.split(" ")[1];
   questionOL = btn.parentElement.parentElement;
   questionOL.children[i-1].remove();

   for(let j=1; j<=questionOL.childElementCount; j++){
    const li = questionOL.children[j-1];
    li.id = "question " + j;
    li.children[1].innerHTML = "Question " + j;
    li.children[2].id = li.children[2].name = li.children[2].id.substring(0,14) + j;
    li.children[4].id = "answerList " + j;
    for(let k=1; k<=li.children[4].childElementCount; k++){
      const li2 = li.children[4].children[k-1];
      li2.children[1].name = "radio " + j;
      input = li2.children[2];
      input.name = input.id = input.id.substring(0,7) + j + " " + k;
    }
    console.log(li);
  }

  if(questionOL.childElementCount == 1){
      questionOL.children[0].children[0].remove();
  }
  }
</script>