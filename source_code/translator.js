function indexTranslator() {
    var x = document.getElementById('indo');
    var x1 = document.getElementById('indo1');
    var y = document.getElementById('eng');
    var y1 = document.getElementById('eng1');
    if (x.style.display === 'none' && x1.style.display === 'none') {
        x.style.display = 'block';
        x1.style.display = 'block';
        y.style.display = 'none';
        y1.style.display = 'none';
    } 
    else {
        x.style.display = 'none';
        x1.style.display = 'none';
        y.style.display = 'block';
        y1.style.display = 'block';
    }
}

function termcondTranslator() {
    var x = document.getElementById('indo');
    var y = document.getElementById('eng');
    if (x.style.display === 'none') {
        x.style.display = 'block';
        y.style.display = 'none';
    }
    else {
        x.style.display = 'none';
        y.style.display = 'block';
    }
}

function mobileMenuKeepOpen() {
    var x = document.getElementById("mobileDropdown-content");
    if (x.style.display === 'none') {
        x.style.display = 'block';
    }
    else {
        x.style.display = 'none';
    }
}