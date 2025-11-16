document.getElementById("myForm").addEventListener("submit", function(e){
    e.preventDefault(); // stop reload

    let name = document.getElementById("name").value;

    fetch("process.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "name=" + encodeURIComponent(name)
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("result").innerHTML = JSON.stringify(data);
    })
    .catch(err => console.log(err));
});
