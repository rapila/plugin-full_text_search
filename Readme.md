# Configuration

## Steps

1. Configure the `full_text_search` `update_secret` param in your site/config/config.yml.
2. Create the update cron job: `curl http://your-rapila-installation/get_file/update_search_index/language-id?secret=your-secret`.
   (Set `your-rapila-installation`, `language-id` and `your-secret` to appropriate values. `your-secret` is what you set in the first step. Use multiple cron jobs for a multilingual installation.)
3. Add the necessary tables to your database (or do an automatic migration). Re-generate the model.
4. Create a page of page type “search result” for the search results.
5. To create your own search result template. Put template-name.tmpl and template-name_item.tmpl into `CONTEXT_DIR/templates/search_results` (where `CONTEXT_DIR` will be “site” unless you’re developing your own plugin). `template-name` is the name of the template for your search-result page. You may also name your template “default” (there is a default template set already included with the full_text_search plugin).
6. Put the `{{searchForm}}` identifier somewhere in your template to output a form to the search result page.
7. Crawl `http://your-rapila-installation/get_file/update_search_index/language-id?secret=your-secret` manually to create your search index.
