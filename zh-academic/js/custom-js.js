            //For ajax click oading of content
            $(document).ready(function(){
                 $('.modules-list-section li').click(function(){
                    //  alert($(this).attr("id"));
                      var module_slug;
                      module_slug = $(this).attr("id");
                      debugger
                      alert(module_slug);

                   });
            });

