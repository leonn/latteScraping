<script>
var IDs=[];
var lattesData=[];
function lattesSearch(str){
  if (window.XMLHttpRequest){
    xmlhttp=new XMLHttpRequest();
  }
  else {// code for IE6,5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200){

      if (window.XMLHttpRequest){
        xmlhttp2=new XMLHttpRequest();
      }
      else {// code for IE6,5
        xmlhttp2=new ActiveXObject("Microsoft.XMLHTTP");
      } 

      xmlhttp2.onreadystatechange=function(){
          if (xmlhttp2.readyState==4 && xmlhttp2.status==200){
             tabBody=document.getElementsByTagName("tbody").item(0);
             row = document.createElement("TR");
             cell = document.createElement("TD");
             cell.align='center';
             str=xmlhttp2.responseText.replace("&iacute;","í");
             str=str.replace("&iacute;","í");
             responseData=str.split(",");
             text=responseData[0]; 
             cell.innerHTML="<a href='"+text+"'>"+text+"</a>";
             row.appendChild(cell);
             cell = document.createElement("TD");
             cell.innerHTML=responseData[1];
             row.appendChild(cell);
             cell = document.createElement("TD");
             cell.innerHTML=responseData[2];
             row.appendChild(cell);
             tabBody.appendChild(row);
          }
      }

      xmlhttp2.open("POST","lattesData.php",true);
      xmlhttp2.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
      data=xmlhttp.responseText.search("abreDetalhe");
      data='data='+xmlhttp.responseText.substr([data+13],10);
      xmlhttp2.send(data);
    }
  }

  xmlhttp.open("POST","http://buscatextual.cnpq.br/buscatextual/busca.do",true);
  xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  str=str.replace(" ","+");
  data='metodo=buscar&filtros.buscaNome=true&textoBusca='+str+'&buscarDoutores=true&buscarDemais=true';
  xmlhttp.send(data);
}

function lattesSearchID(str,i){
  if (window.XMLHttpRequest){
    xmlhttp=new XMLHttpRequest();
  }
  else {// code for IE6,5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200){
       data=xmlhttp.responseText.search("abreDetalhe");
      data=xmlhttp.responseText.substr([data+13],10);
      IDs[i]= data;
    }
  }
  xmlhttp.open("POST","http://buscatextual.cnpq.br/buscatextual/busca.do",true);
  xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  str=str.replace(" ","+");
  data='metodo=buscar&filtros.buscaNome=true&textoBusca='+str+'&buscarDoutores=true&buscarDemais=true';
  xmlhttp.send(data);
}

function lattesSearchData(i){
  if (window.XMLHttpRequest){
    xmlhttp=new XMLHttpRequest();
  }
  else {// code for IE6,5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200)     
      lattesData[i]= xmlhttp.responseText;
  }

  xmlhttp.open("POST","lattesData.php",true);
  xmlhttp.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
  data=xmlhttp.responseText.search("abreDetalhe");
  data='data='+IDs[i];
  xmlhttp.send(data);
}


function lattesSearchAll(sstr){
  sstr=sstr.split("\n");
  for (var i = 0; i < sstr.length ; i++) {
    lattesSearchID(sstr[i],i);
  }
  setTimeout(function(){
      for (var i = 0; i < sstr.length ; i++) {
        lattesSearchData(i);
      }
    },1000*sstr.length);
  }
  

</script>
<input id='nameSearch' type="text"/>
  <button onClick="lattesSearch(document.getElementById('nameSearch').value)">Get This</button>
  <br><br><br><br><br>

  <textarea id='namesSearch'></textarea></td>
<button onClick="lattesSearchAll(document.getElementById('namesSearch').value)">Get These All</button>
<br/>
<table width="90%" border="0" cellspacing="2" cellpadding="2" align="center" border="5" >
 <thead>
  <th>Links Lattes</th>
  <th>Texto autor</th>
  <th>Nivel</th>
 </thead>
 <tbody>    
 </tbody>
</table>
