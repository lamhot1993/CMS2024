<div class="container" id="search">
	<div class="mb-3">
		<label for="exampleFormControl" class="form-label"></label>
		<input type="text" v-model="search_news" ref="search_news" @keypress="enterSearch" class="form-control" id="exampleFormControl" placeholder="Search News...">
	</div>
</div>


<script>
	const $url = "<?= base_url() ?>";
	new Vue({
		el : '#search',
		data : {
			search_news : null
		},
		methods: {
			enterSearch: function(e){
				if (e.keyCode==13){
					this.searchData()
				}
			},
			searchData : function(){
				window.location.href= $url + "news/search/"+this.search_news
			}
		},
		mounted() {
			this.$refs.search_news.focus();
		},
	})

</script>
