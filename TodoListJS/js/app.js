function addTodo() {
    // alert(document.getElementById("todo").value);
    var parent = document.getElementById("todoList");
    var tag = document.createElement("li");
    var li = document.createTextNode(document.getElementById("todo").value);
    tag.appendChild(li);
    tag.onclick = function() { parent.removeChild(this) };
    parent.appendChild(tag);
    document.getElementById("todo").value = "";
}

