        function addGoal (){
            var title_input = $("#goal-title").val();
            var amount_input = $("#amount_input").val();

            if (title_input == ""){ 
                $(".goal-title").text("Goal Title");
                $("#goal-title").val("")
                $("#goal-title").css("border", "1px solid red")

            }else{
                $(".goal-title").text(title_input);
                $("#goal-title").val("");
                $("#amount_input").val("");
                $(".totalAmount").text(amount_input) 
                $("#goal-title").css("border", "1px solid grey").css("color", "white");
                $(".dateDue").text($("#dateDue").val())
 
            };


        };

        function plusAmount (){
            let amountAdded = $("#addAmount");
            let amount_saved = $("#amountSaved");
            amountAdded = Number(amountAdded.val());
            amount_saved = Number(amount_saved.text());
            amount_saved +=amountAdded;
            $("#amountSaved").text(amount_saved);
        


            let totalAmount_saved = Number($(".totalAmount").text());
            let amountSaved2 = Number($("#amountSaved").text()) ;
            let progress = Math.ceil( (amountSaved2 / totalAmount_saved ) * 100);

            if(progress >= 110){
                $("#amountSaved").text(totalAmount_saved);
               let cmessage =  $(".Cmessage");
               cmessage.text("Goal Completed!");
               cmessage.css("color", "green").css("font-size", "1.2em");
               alert("Amount is too much for the goal to be completed");
            }else{     
                let pg = progress+"%";
                toString(pg);
                $(".progress-bar").css("width", pg);
                $(".goal-progress").text(progress +"%")
            } 
            
         $("#addAmount").val("");


        }              