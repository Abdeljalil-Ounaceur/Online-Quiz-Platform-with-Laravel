<script>
  function addAnswer(btn) {
    let li = document.createElement("li");
    let answerList = btn.parentElement.parentElement;
    let n_quest = answerList.id.split(" ")[1];
    let n_ans = answerList.childElementCount+1;
    let id_ans = "answer "+n_quest+" "+n_ans;
    let color = (parseInt(n_ans) % 2) === 1 ? "#dddddd" : "#eeeeee";
    li.style.backgroundColor =  color;
    console.log(li.style.backgroundColor);
    li.className = "list-group-item";
    li.innerHTML = ""+
        "<label for='"+id_ans+"'>"+n_ans+".&nbsp </label>"+
        "<input type=\"radio\" id=\"radio "+n_quest+" "+n_ans+"\" class=\"mx-2\" name=\"radio "+n_quest+"\" value=\""+n_ans+"\">"+
        "<input type=\"text\" id='"+id_ans+"' class='mx-1' name='"+id_ans+"'>"+
        "<button class=\"mx-3\" type=\"button\" onclick=\"addAnswer(this)\">+</button>"
      "";
    answerList.appendChild(li);
    console.log(btn.id);
    btn.parentElement.removeChild(btn);
  }

  function addQuestion() {
    let li = document.createElement("li");
    let questionList = document.getElementById("questions");
    let n_quest = questionList.childElementCount+1;
    let color = (parseInt(n_quest) % 2) === 1 ? "#d3d3d3" : "#dfdfdf";
    let id_quest = "question "+n_quest;
    li.style.backgroundColor = color;
    li.className = "list-group-item pb-4 mb-2";
    li.innerHTML = "" +
        "<label for=\"question text "+n_quest+"\">Question "+n_quest+"</label>" +
        "<input type=\"text\" id=\"question text "+n_quest+"\" class=\"form-control\" name=\"question text "+n_quest+"\"><br>"+
        "<label for=\"answerList "+n_quest+"\">Answers</label>"+
          "<ol type=\"a\" id=\"answerList "+n_quest+"\">"+
            "<li class=\"list-group-item\" style=\"background-color: #dddddd\">"+
                "<label for=\"answer "+n_quest+" 1\">1. </label>"+
                "<input type=\"radio\" id=\"radio "+n_quest+" 1\" class=\"mx-2\" name=\"radio "+n_quest+"\" value=\"1\" checked>"+
                "<input type=\"text\" id=\"answer "+n_quest+" 1\" class=\"mx-2\" name=\"answer "+n_quest+" 1\">"+
                "<button class=\"mx-3\" type=\"button\" onclick=\"addAnswer(this)\">+</button>"+
            "</li>"+
          "</ol>";
    li.id = id_quest;
    questionList.appendChild(li);
  }
</script>