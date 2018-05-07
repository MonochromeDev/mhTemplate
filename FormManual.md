# FORMMANUAL #

This is guide how setting forms for clients in this template.

### What is this guider for? ###

* for front-end development of landing pages for Monochrome development band
* Version 1.0

### How do I get set up? ###

* basic data values and names already in the template

### Only sand google form  ###
* basic setting for forms
* we hav new variables (gf_action, mh_action)
* gf_action we white action for google form (other variables (name, email, phone, and utm) already in code)
```
	function validate(formid)
		{
			var output = false;
			var name, email, phone, utm_source, utm_campaign, utm_medium, utm_term, gf_action, mh_action, plan, sum, sum_usd, product, ga_client_id, country, referer;
			form = $(formid);
			form.addClass('loading');
			form.find('input[name="name"]').focus();
			form.find('input[name="email"]').focus();
			form.find('input[name="phone"]').focus();
			form.find('button[type="submit"]').focus();
			name = form.find('input[name="name"]').val();
			email = form.find('input[name="email"]').val();
			phone = form.find('input[name="phone"]').val();
			country = form.find('input[name="country"]').val();
			plan = form.find('input[name="plan"]').val();
			utm_source = form.find('input[name="utm_source"]').val();
			utm_campaign = form.find('input[name="utm_campaign"]').val();
			utm_medium = form.find('input[name="utm_medium"]').val();
			utm_term = form.find('input[name="utm_term"]').val();
			phone = phone.replace(/\s/g, '');
			gf_action = ''; // put here google form action;
			referer = window.location.href;
			var ga = getCookie('_ga').split('.');
			ga_client_id = ga[2] + '.' + ga[3];
			if ($('.not_error').length == 3)
			{
				$.ajax(
				{
					type: "POST",
					url: 'gf/export.php',
					async: false,
					data:
					{
						gf_action: gf_action,
						name: name,
						email: email,
						phone: phone,
						utm_campaign: utm_campaign,
						utm_source: utm_source,
						utm_medium: utm_medium,
						utm_term: utm_term
					},
					success: function(json_data)
					{
						setCookie('name', name, 365);
						setCookie('email', email, 365);
						setCookie('phone', phone, 365);
						console.log('data sended!');
						console.log(json_data);
						setTimeout(function(){
							form.removeClass('loading');
						}, 5000)
						output = true;
					}
				});
			}
			else
			{
				form.find('input.error').first().focus();
				form.removeClass('loading');
			}
			return output;
		};
```
### Sending AJAX to gf and monochrome  ###

* if need sending ajax to monochrome, we add some variables to validate funcrion, and ajax code from template/common/mhajax.jade
* and add new variables values to validate funcrion (sum, sum_usd, product, mh_action and other we need...)
```
	function validate(formid)
		{
			var output = false;
			var name, email, phone, utm_source, utm_campaign, utm_medium, utm_term, gf_action, mh_action, plan, sum, sum_usd, product, ga_client_id, country, referer;
			form = $(formid);
			form.addClass('loading');
			form.find('input[name="name"]').focus();
			form.find('input[name="email"]').focus();
			form.find('input[name="phone"]').focus();
			form.find('button[type="submit"]').focus();
			name = form.find('input[name="name"]').val();
			email = form.find('input[name="email"]').val();
			phone = form.find('input[name="phone"]').val();
			country = form.find('input[name="country"]').val();
			plan = form.find('input[name="plan"]').val();
			product = form.find('input[name="product"]').val();
			sum = form.find('input[name="sum"]').val();
			sum_usd = form.find('input[name="sum_usd"]').val();
			utm_source = form.find('input[name="utm_source"]').val();
			utm_campaign = form.find('input[name="utm_campaign"]').val();
			utm_medium = form.find('input[name="utm_medium"]').val();
			utm_term = form.find('input[name="utm_term"]').val();
			phone = phone.replace(/\s/g, '');
			gf_action = ''; // put here google form action;
			mh_action = ''; // put here monochrome form action;
			referer = window.location.href;
			var ga = getCookie('_ga').split('.');
			ga_client_id = ga[2] + '.' + ga[3];
			if ($('.not_error').length == 3)
			{
				$.ajax(
				{
					type: "POST",
					url: 'gf/export.php',
					async: false,
					data:
					{
						gf_action: gf_action,
						name: name,
						email: email,
						phone: phone,
						utm_campaign: utm_campaign,
						utm_source: utm_source,
						utm_medium: utm_medium,
						utm_term: utm_term
					},
					success: function(json_data)
					{
						console.log('data sended to gf!');
						console.log(json_data);
					}
				}),
				$.ajax(
				{
					type: "POST",
					url: 'mh/export.php',
					async: false,
					data:
					{
						mh_action: mh_action,
						name: name,
						email: email,
						phone: phone,
						plan: plan,
						product: product,
						sum: sum,
						sum_usd: sum_usd,
						ga_client_id: ga_client_id,
						country: country,
						referer: referer,
						utm_campaign: utm_campaign,
						utm_source: utm_source,
						utm_medium: utm_medium,
						utm_term: utm_term
					},
					success: function(json_data)
					{
						setCookie('name', name, 365);
						setCookie('email', email, 365);
						setCookie('phone', phone, 365);
						console.log('data sended!');
						console.log(json_data);
						setTimeout(function(){
							form.removeClass('loading');
						}, 5000)
						output = true;
					}
				});
			}
			else
			{
				form.find('input.error').first().focus();
				form.removeClass('loading');
			}
			return output;
		};
```




