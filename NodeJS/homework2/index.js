const colors = require('colors/safe');
/*
    --Задача 1--

    console.log( 'Record 1' );
    setTimeout(() => {
        console.log('Record 2');
        Promise.resolve().then(() => {
            setTimeout(() => {
                console.log('Record 3');
                Promise.resolve().then(() => {
                    console.log('Record 4');
                });       
            });
        });       
    });
    setTimeout(() => {
        console.log('Record 2');    
    });
    console.log( 'Record 5' );
    Promise.resolve().then(() => Promise.resolve().then(() => console.log('Record 6')));

    # Обяснение

    - Чтение файла происходит сверху внизу, записывая каждую задачу по пути вниз в цикл событий
    - Приоритеты вполнения -функции, --промисы, ---таймеры
    - Если в Промисе есть дугой промис, то приоритет ниже чем у промиса с простые функции
        Promise.resolve().then(() => Promise.resolve().then(() => console.log('Record 1')));
        Promise.resolve().then(() => console.log('Record 2'));
        - В этом случае выведится сначала 2, затем 1
    - Если в Промисе есть таймер, то приоритет у неё ниже чем у промиса с промисом
    Данный пример будет выполняться в следующим порядке
    1) console.log( 'Record 1' );
    2) console.log( 'Record 5' );
    3) Promise.resolve().then(() => Promise.resolve().then(() => console.log('Record 6')));
    4) setTimeout(() => {
        console.log('Record 2');    
    });
    5) setTimeout(() => {
        ----
        Promise.resolve().then(() => {
        setTimeout(() => {
            console.log('Record 3');
        });
    });    
    7) setTimeout(() => {
        ----
        Promise.resolve().then(() => {
            setTimeout(() => {
                ----
                Promise.resolve().then(() => {
                    console.log('Record 4');
                });       
            });  
        }); 
    });

    Результат: 1, 5, 6, 2, 3, 4
*/

/*
    --Задача 2--

    # Напишите программу, которая будет принимать на вход несколько аргументов: дату и время в формате «час-день-месяц-год». 
    Задача программы — создавать для каждого аргумента таймер с обратным отсчётом: посекундный вывод в терминал состояния таймеров (сколько осталось). 
    По истечении какого-либо таймера, вместо сообщения о том, сколько осталось, требуется показать сообщение о завершении его работы. 
    Важно, чтобы работа программы основывалась на событиях.
*/

let dateLoc = process.argv[2],
    timeLoc = process.argv[3];

if(dateLoc == undefined || timeLoc == undefined)
    errorCons("Не ведены данные, дата или время");
if(dateLoc.match(/[0-9]{1,2}.[0-9]{2}.[0-9]{2,4}/) != null && timeLoc.match(/[0-9]{1,2}:[0-9]{2}/) != null )
{
    initializeClock();
}
else
    errorCons("Не правельный формат ввода\nПример: 10.07.2021 17:35");

function lastTime()
{
    let datatime = [];
    let hours = timeLoc.match(/[0-9]{1,2}:/)[0].replace(/:/, "");
    hours /= 3600;
    let days = dateLoc.match(/[0-9]{1,2}./)[0].replace(/\./, "");
    days /= 86400;

    return datatime[hours, days];
}

function errorCons(text)
{
    console.log( colors.red(text) );
}

function initializeClock(endtime) {
  
    function updateClock() {
  
      console.log( lastTime()[1],
        ('0' + lastTime()[0]).slice(-2) );
  
      if (t.total <= 0) {
        clearInterval(timeinterval);
      }
    }
  
    updateClock();
    let timeinterval = setInterval(updateClock, 1000);
  }

// input 10.07.2021 17:35
// type 17-10-07-2021