function deleteAriticle(product_name){

  if (confirm("Do you really want to delete this item") === true) ajax(request('supprimer_article', 'reference=' + product_name))

}
