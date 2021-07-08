const colors = require('colors/safe');

let a = +(process.argv[2]),
    b = +(process.argv[3]),
    tmpArr = [],
    firstNumb = a;

if(isNaN(a) || isNaN(b))
{
    errorCons("Введенное не является числом.");
}
else
{
    if(a == b)
    {
        errorCons("Диапазон должен состоять из: от n числа до m числа");
    }
    if(a > b)
    {
        errorCons("Второе число не может быть меньше первого");
    }
    if(a < b)
    {
        if(a < 2)
        {
            a = 2;
        }

        for(let i = a; i <= b; i++)
        {
            if(i == 2)
                tmpArr.push(i);
            if(i == 3)
                tmpArr.push(i);
            for(let k = 2; (k * k) <= i; k++)
            {
                if( i % k == 0 )
                    break;
                else if( k + 1 > Math.sqrt(i) )
                {
                    tmpArr.push(i);
                }    
            }
        }
        
        if(tmpArr.length != 0)
        {
            console.log(colors.cyan( "Диапазон чисел - от", firstNumb, "до", b ));
            console.log(colors.magenta( "Все простые числа в диапазоне -", tmpArr ));

            for(let i = 0; i < tmpArr.length; i++)
            {
                if(i % 3 == 0)
                    console.log( colors.green(tmpArr[i]) );
                if(i % 3 == 1)
                    console.log( colors.yellow(tmpArr[i]) );
                if(i % 3 == 2)
                    console.log( colors.red(tmpArr[i]) );
            }
        }
        if(tmpArr.length == 0)
            errorCons("В диапазоне, нет простых чисел");
    }
}

function errorCons(text)
{
    console.log( colors.red(text) );
}