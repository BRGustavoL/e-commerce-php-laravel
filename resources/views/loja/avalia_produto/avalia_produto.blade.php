@include('templates.header.header')
  <div class="dashboard-nav">
    @include('templates.navbar_loja.navbar_loja')
  </div>
  <div class="container avalia-produto">
    <div class="card">
      <div class="card-header">Avaliação do Produto #{{ $produto_id }}</div>
      <div class="card-body">
        <form action="/finaliza_avaliacao" enctype="multipart/form-data" method="POST">
          {{ csrf_field() }}
          <div class="container">
            <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
              <input type="hidden" class="form-control" name="prod_id" value="{{ $produto_id }}">
              <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
              <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
              <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
              <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
              <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
            </div>
          </div>
          <div class="button-avalia">
            <a class="cancel-buttton btn btn-secondary" href="/">Cancelar</a>
            <button type="submit" class="btn btn-warning btn-avalia">Finalizar Avaliação</button>
          </div>	
        </form>
      </div>
    </div>
  </div>
@include('templates.footer.footer')

<style>
  .button-avalia {
    display: flex;
    justify-content: flex-end;
  }
  .cancel-buttton {
    margin-right: 5px;
  }
  .avalia-produto {
    margin-top: 40px;
  }
/***
 *  Simple Pure CSS Star Rating Widget Bootstrap 4 
 * 
 *  www.TheMastercut.co
 *  
 ***/

 @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

/* Styling h1 and links
––––––––––––––––––––––––––––––––– */
.starrating > input {display: none;}  /* Remove radio buttons */

.starrating > label:before { 
  content: "\f005"; /* Star */
  margin: 2px;
  font-size: 2em;
  font-family: FontAwesome;
  display: inline-block; 
}

.starrating > label
{
  color: #222222; /* Start color when not clicked */
}

.starrating > input:checked ~ label
{ color: #ffca08 ; } /* Set yellow color when star checked */

.starrating > input:hover ~ label
{ color: #ffca08 ;  } /* Set yellow color when star hover */


</style>