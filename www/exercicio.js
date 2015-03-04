function mascaraData(campoData){
              var data = campoData.value;
              if (data.length == 2){
                  data = data + '/';
                  document.forms[0].data.value = data;
                   return true;              
              }
              if (data.length == 5){
                  data = data + '/';
                
                var idade = data.split('/').[2];
                  document.forms[0].data.value = data;
                  return true;
              }
         }