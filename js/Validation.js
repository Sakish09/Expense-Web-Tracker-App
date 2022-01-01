function validateForm()
{
    var x=document.forms["ExpenseForm"]["dateexpense"].value;  
    if(x==null || x=="" )
    {
        alert("Please insert the date");
        return false;
    }

    var y=document.forms["ExpenseForm"]["costitem"].value;
    if(y==null || y=="")
    {
        alert("Please enter the amount");
        return false;
    }
    else
    {
        return true;
    }

}

function validateForm2()
{
    var x=document.forms["IncomeForm"]["IncomeDate"].value;  
    if(x==null || x=="" )
    {
        alert("Please insert the date");
        return false;
    }

    var y=document.forms["IncomeForm"]["IncomeAmount"].value;
    if(y==null || y=="")
    {
        alert("Please enter the amount");
        return false;
    }
    else
    {
        return true;
    }

}

function validateForm3()
{
    var x=document.forms["RegForm"]["name"].value;  
    if(x==null || x=="" )
    {
        alert("Please insert the name");
        return false;
    }

    var y=document.forms["RegForm"]["email"].value;
    if(y==null || y=="")
    {
        alert("Please enter an email");
        return false;
    }

    var y=document.forms["RegForm"]["password"].value;
    if(y==null || y=="")
    {
        alert("Please enter a password");
        return false;
    }

    else
    {
        return true;
    }

}

function validateForm4()
{
    var x=document.forms["LoginForm"]["email"].value;  
    if(x==null || x=="" )
    {
        alert("Please enter your email");
        return false;
    }

    var y=document.forms["LoginForm"]["password"].value;
    if(y==null || y=="")
    {
        alert("Please enter your password");
        return false;
    }
    else
    {
        return true;
    }

}