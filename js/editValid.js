function EditValid(){

if( isNaN(document.Edit.price.value) ) {
             alert( "Price must be a number" );
            document.Edit.price.focus() ;
            return false;
         }

}