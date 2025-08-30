jQuery(document).ready(function() {
	if(jQuery('#logo').length > 0) {
		jQuery('#logo').change(function(event) {
			if(jQuery('#logo_cover').find('.alert').length > 0) {
				jQuery('#logo_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				upload_files(this, 'logo', '0');
			}
		});	
	}
	if (jQuery('#brand_image').length > 0) {
		jQuery('#brand_image').change(function (event) {
			if (jQuery('#brand_image_cover').find('.alert').length > 0) {
				jQuery('#brand_image_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if (count != 0) {
				upload_files(this, 'brand_image', '0');
			}
		});
	}

	if(jQuery('#desktop_home_banner').length > 0) {
		jQuery('#desktop_home_banner').change(function(event) {
			event.preventDefault();
			if(jQuery('#desktop_home_banner_cover').find('.alert').length > 0) {
				jQuery('#desktop_home_banner_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				var form_data = new Array();
				for(var i = 0; i < count; i++) {
					form_data.push(jQuery(this).get(0).files[i]);
				}
				upload_multiple_files(form_data, 'desktop_home_banner', '0');
				event.target.value = null;
			}
			else {
				return false;
			}
		});	
	}
	if(jQuery('#mobile_home_banner').length > 0) {
		jQuery('#mobile_home_banner').change(function(event) {
			event.preventDefault();
			if(jQuery('#mobile_home_banner_cover').find('.alert').length > 0) {
				jQuery('#mobile_home_banner_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				var form_data = new Array();
				for(var i = 0; i < count; i++) {
					form_data.push(jQuery(this).get(0).files[i]);
				}
				upload_multiple_files(form_data, 'mobile_home_banner', '0');
				event.target.value = null;
			}
			else {
				return false;
			}
		});
	}
	if(jQuery('#category_cover_image').length > 0) {
		jQuery('#category_cover_image').change(function(event) {
			if(jQuery('#category_cover_image_cover').find('.alert').length > 0) {
				jQuery('#category_cover_image_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
            console.log(count);
			if(count != 0) {
				upload_files(this, 'category_cover_image');
			}
		});	
	}
	if(jQuery('#category_mobile_cover_image').length > 0) {
		jQuery('#category_mobile_cover_image').change(function(event) {
			if(jQuery('#category_mobile_cover_image_cover').find('.alert').length > 0) {
				jQuery('#category_mobile_cover_image_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				upload_files(this, 'category_mobile_cover_image');
			}
		});	
	}
	if(jQuery('#category_mobile_cover_image').length > 0) {
		jQuery('#category_mobile_cover_image').change(function(event) {
			if(jQuery('#category_mobile_cover_image_cover').find('.alert').length > 0) {
				jQuery('#category_mobile_cover_image_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				upload_files(this, 'category_mobile_cover_image');
			}
		});	
	}
	if(jQuery('#multiple_image').length > 0) {
		jQuery('#multiple_image').change(function(event) {
			if(jQuery('#multiple_image_cover').find('.alert').length > 0) {
				jQuery('#multiple_image_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				multiple_upload_files(this, 'multiple_image', '0');
			}
		});	
	}	
	if(jQuery('#product_main_image').length > 0) {
		jQuery('#product_main_image').change(function(event) {
			if(jQuery('#product_main_image_cover').find('.alert').length > 0) {
				jQuery('#product_main_image_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				upload_files(this, 'product_main_image');
			}
		});	
	}
	if(jQuery('#product_sub_image').length > 0) {
		jQuery('#product_sub_image').change(function(event) {
			event.preventDefault();
			if(jQuery('#product_sub_image_cover').find('.alert').length > 0) {
				jQuery('#product_sub_image_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				var form_data = new Array();
				for(var i = 0; i < count; i++) {
					form_data.push(jQuery(this).get(0).files[i]);
				}
				upload_multiple_files(form_data, 'product_sub_image', '0');
				event.target.value = null;
			}
			else {
				return false;
			}
		});
	}

	if(jQuery('#advertisement_cover_image').length > 0) {
		jQuery('#advertisement_cover_image').change(function(event) {
			if(jQuery('#advertisement_cover_image_cover').find('.alert').length > 0) {
				jQuery('#advertisement_cover_image_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				upload_files(this, 'advertisement_cover_image');
			}
		});	
	}
	if(jQuery('#advertisement_mobile_cover_image').length > 0) {
		jQuery('#advertisement_mobile_cover_image').change(function(event) {
			if(jQuery('#advertisement_mobile_cover_image_cover').find('.alert').length > 0) {
				jQuery('#advertisement_mobile_cover_image_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				upload_files(this, 'advertisement_mobile_cover_image');
			}
		});	
	}
	if(jQuery('#blog_cover_image').length > 0) {
		jQuery('#blog_cover_image').change(function(event) {
			if(jQuery('#blog_cover_image_cover').find('.alert').length > 0) {
				jQuery('#blog_cover_image_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				upload_files(this, 'blog_cover_image');
			}
		});	
	}
	if(jQuery('#blog_mobile_cover_image').length > 0) {
		jQuery('#blog_mobile_cover_image').change(function(event) {
			if(jQuery('#blog_mobile_cover_image_cover').find('.alert').length > 0) {
				jQuery('#blog_mobile_cover_image_cover').find('.alert').remove();
			}
			var count = jQuery(this).get(0).files.length;
			if(count != 0) {
				upload_files(this, 'blog_mobile_cover_image');
			}
		});	
	}
});

function upload_multiple_files(form_data, field, index) {
	if(parseInt(index) < form_data.length) {
        var file = form_data[index];
		if(typeof file != "undefined" && file != null && file != "") {
			var image_type = file.type;
			var idxDot = file.name.lastIndexOf(".") + 1;
			var extFile = file.name.substr(idxDot, file.name.length).toLowerCase();
			if(extFile=="jpg" || extFile=="jpeg" || extFile=="png" || extFile=="gif") {
				var image_size = file.size;
				if(image_size < 2000000) {
					var fileReader = new FileReader();
					fileReader.readAsDataURL(file);
					fileReader.onload = (function(event) {
						var image = new Image();
						image.src = event.target.result;
						image.onload = function() {
							if(field == "desktop_home_banner") {
								if(this.width == 1500 && this.height == 500) {
									var image_url = event.target.result;
									var request = jQuery.ajax({ url: "image_upload.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});							
									request.done(function(result) {
										var banner_div_id = '<div class="col-sm-6"><div id="banner_div" class="form-group w-100 px-3 py-3">'+result+'</div></div>';
										jQuery('.desktop_home_banner_cover').append(banner_div_id);

										setTimeout( function(){ 
											index = parseInt(index) + 1;
											upload_multiple_files(form_data, field, index);
										}, 1000);
									});
								}
								else {
									if(jQuery('div.alert').length > 0) {
										jQuery('div.alert').remove();
									}
									jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Upload image given required size</div>');
								}
							}
							else if(field == "mobile_home_banner") {
								if(this.width == 630 && this.height == 700) {
									var image_url = event.target.result;
									var request = jQuery.ajax({ url: "image_upload.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});							
									request.done(function(result) {
										var banner_div_id = '<div class="col-sm-4"><div id="banner_div" class="form-group w-100 px-3 py-3">'+result+'</div></div>';
										jQuery('.mobile_home_banner_cover').append(banner_div_id);

										setTimeout( function(){ 
											index = parseInt(index) + 1;
											upload_multiple_files(form_data, field, index);
										}, 1000);
									});
								}
								else {
									if(jQuery('div.alert').length > 0) {
										jQuery('div.alert').remove();
									}
									jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Upload image given required size</div>');
								}
							}
							else if(field == "product_sub_image") {
								if(this.width == 1000 && this.height == 1000) {
									var image_url = event.target.result;
									var request = jQuery.ajax({ url: "image_upload.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});							
									request.done(function(result) {
										var banner_div_id = '<div class="col-sm-3"><div id="banner_div" class="form-group w-100 px-3 py-3">'+result+'</div></div>';
										jQuery('.multiple_upload_image_list').append(banner_div_id);

										setTimeout( function(){ 
											index = parseInt(index) + 1;
											upload_multiple_files(form_data, field, index);
										}, 1000);

									});
								}
								else {
									if(jQuery('div.alert').length > 0) {
										jQuery('div.alert').remove();
									}
									jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Upload image given required size</div>');
								}
							}
						}
					});
				}else {
					if(jQuery('div.alert').length > 0) {
						jQuery('div.alert').remove();
					}
					jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Upload image given required size</div>');
				}
			}
			else {
				if(jQuery('div.alert').length > 0) {
					jQuery('div.alert').remove();
				}
				jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Invalid Image Format</div>');
			}
		}
    }
}

function multiple_upload_files(obj, field, cropper) {
	if(jQuery('div.alert').length > 0) {
		jQuery('div.alert').remove();
	}
	// alert(obj)

	var fileName = jQuery(obj).get(0).files[0];	
	// alert(fileName);
	var image_type = fileName.type;

	var idxDot = fileName.name.lastIndexOf(".") + 1;
	var extFile = fileName.name.substr(idxDot, fileName.name.length).toLowerCase();
	if(extFile=="jpg" || extFile=="jpeg" || extFile=="png") {
		var image_size = fileName.size;
		if(image_size < 2000000) {
			var width = ""; var height = "";		
			var reader = new FileReader();				
			reader.readAsDataURL(fileName);					
			reader.onload = function(event) {
				var image = new Image();
				image.src = event.target.result;
				image.onload = function() {
					if(cropper == 1) {
						jQuery("#"+field+"_preview").fadeIn("fast").attr('src',event.target.result);
						width = this.width;
						height = this.height;
						start(field, width, height, image_type);
					}
					else {
						// var width = 600; var height = 340;
						// /*if(field == "home_banner") { width = 1500; height = 500; }
						// else { */
						var image_count = 0;
						image_count = jQuery('#'+field+'_view').find('.'+field+'_div').length;
						// alert(image_count);
						 width = this.width; height = this.height; 
						// alert("width:"+width+" height:"+height);
						if(parseInt(image_count) <= 5) {

							if(this.width == 800 && this.height == 800) {
								jQuery("#"+field+"_view").fadeIn("fast").attr('src',event.target.result);
								var image_url = event.target.result;
								var request = jQuery.ajax({ url: "image_upload.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});			

								request.done(function(result) {
									// alert(result);
									var banner_div_id = '<div class="'+field+'_div"><div class="form-group w-100 px-3 py-3 cover">'+result+'</div></div>';                                 
									jQuery('#'+field+'_view').append(banner_div_id);
								});
							}
							else {
								if(jQuery('div.alert').length > 0) {
									jQuery('div.alert').remove();
								}
							
								jQuery('#'+field+'_view').before('<div class="alert alert-danger w-100 text-center"> Image size should be 800 x 800 size</div>');
							}
						}
						else {
							if(jQuery('div.alert').length > 0) {
								jQuery('div.alert').remove();
							}
							jQuery('#'+field+'_view').before('<div class="alert alert-danger w-100 text-center">Maximum image upload count was 6</div>');
						}
						
					}
				}
			}
		}
		else {
			if(jQuery('div.alert').length > 0) {
				jQuery('div.alert').remove();
			}
			jQuery('#'+field+'_view').before('<div class="alert alert-danger w-100 text-center">Image size is greater than 2MB</div>');
		}
		
	}
	else {
		if(jQuery('div.alert').length > 0) {
			jQuery('div.alert').remove();
		}
		jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Please upload only jpg, jpeg or png Image  or PDF or Excel</div>');
	}
}

function upload_files(obj, field) {
	console.log('called');
	var fileName = jQuery(obj).get(0).files[0];	
	var image_type = fileName.type;
				
	var idxDot = fileName.name.lastIndexOf(".") + 1;
	var extFile = fileName.name.substr(idxDot, fileName.name.length).toLowerCase();
	if(extFile=="jpg" || extFile=="jpeg" || extFile=="png" || extFile=="gif") {
		var image_size = fileName.size;
		if(image_size < 2000000) {
			var width = ""; var height = "";		
			var reader = new FileReader();				
			reader.readAsDataURL(fileName);					
			reader.onload = function(event) {
				var image = new Image();
				image.src = event.target.result;
				image.onload = function() {
                    if(field == "logo" || field == "brand_image" || field == "order_delivery_image") {
						if (field == 'brand_image') {
							if (this.width == 1000 && this.height == 1000) {
								jQuery("#" + field + "_preview").fadeIn("fast").attr('src', event.target.result);
								var image_url = event.target.result;
								var request = jQuery.ajax({ url: "image_upload.php", type: "POST", data: { "image_url": image_url, "image_type": image_type, "field": field } });
								request.done(function (result) {
									var msg = result;
									jQuery('#' + field + '_cover .cover').html(msg);
								});

							} else {
								if (jQuery('div.alert').length > 0) {
									jQuery('div.alert').remove();
								}
								jQuery('#' + field + '_cover .cover').before('<div class="alert alert-danger w-100 text-center">Upload image given required size(1000 * 1000)</div>');
							}

						} else {
							jQuery("#"+field+"_preview").fadeIn("fast").attr('src',event.target.result);
							var image_url = event.target.result;
							var request = jQuery.ajax({ url: "image_upload.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});							
							request.done(function(result) {
								var msg = result;
								jQuery('#'+field+'_cover .cover').html(msg);
							});
						}
                    }
					else if(field == "category_cover_image" || field == "advertisement_cover_image" || field == "blog_cover_image") {
                        // if(this.width == 800 && this.height == 345) {
                        if(this.width == 1300 && this.height == 300) {                        
                            jQuery("#"+field+"_preview").fadeIn("fast").attr('src',event.target.result);
                            var image_url = event.target.result;
                            var request = jQuery.ajax({ url: "image_upload.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});							
                            request.done(function(result) {
                                var msg = result;
                                jQuery('#'+field+'_cover .cover').html(msg);
                            });
                        }
                        else {
                            if(jQuery('div.alert').length > 0) {
								jQuery('div.alert').remove();
							}
							jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Upload image given required size</div>');
                        }
                    }
					else if(field == "category_mobile_cover_image" || field == "advertisement_mobile_cover_image" || field == "blog_mobile_cover_image") {
                        if(this.width == 630 && this.height == 700) {
                            jQuery("#"+field+"_preview").fadeIn("fast").attr('src',event.target.result);
                            var image_url = event.target.result;
                            var request = jQuery.ajax({ url: "image_upload.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});							
                            request.done(function(result) {
                                var msg = result;
                                jQuery('#'+field+'_cover .cover').html(msg);
                            });
                        }
                        else {
                            if(jQuery('div.alert').length > 0) {
								jQuery('div.alert').remove();
							}
							jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Upload image given required size</div>');
                        }
                    }
					else if(field == "category_thumbnail_default_image1" || field == "category_thumbnail_default_image2" || field == "category_thumbnail_image1" || field == "category_thumbnail_image2") {
                        if(this.width == 224 && this.height == 165) {
                            jQuery("#"+field+"_preview").fadeIn("fast").attr('src',event.target.result);
                            var image_url = event.target.result;
                            var request = jQuery.ajax({ url: "image_upload.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});							
                            request.done(function(result) {
                                var msg = result;
                                jQuery('#'+field+'_cover .cover').html(msg);
                            });
                        }
                        else {
                            if(jQuery('div.alert').length > 0) {
								jQuery('div.alert').remove();
							}
							jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Upload image given required size</div>');
                        }
                    }
					else if(field == "category_thumbnail_default_image3" || field == "category_thumbnail_image3") {
                        if(this.width == 224 && this.height == 339) {
                            jQuery("#"+field+"_preview").fadeIn("fast").attr('src',event.target.result);
                            var image_url = event.target.result;
                            var request = jQuery.ajax({ url: "image_upload.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});							
                            request.done(function(result) {
                                var msg = result;
                                jQuery('#'+field+'_cover .cover').html(msg);
                            });
                        }
                        else {
                            if(jQuery('div.alert').length > 0) {
								jQuery('div.alert').remove();
							}
							jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Upload image given required size</div>');
                        }
                    }
					else if(field == "product_main_image") {
                        if(this.width == 1000 && this.height == 1000) {
                            jQuery("#"+field+"_preview").fadeIn("fast").attr('src',event.target.result);
                            var image_url = event.target.result;
                            var request = jQuery.ajax({ url: "image_upload.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});							
                            request.done(function(result) {
                                var msg = result;
                                jQuery('#'+field+'_cover .cover').html(msg);
                            });
                        }
                        else {
                            if(jQuery('div.alert').length > 0) {
								jQuery('div.alert').remove();
							}
							jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Upload image given required size</div>');
                        }
                    }
					else if(field == "home_products_thumb_image") {
                        //if( (this.width == 590 && this.height == 350) || (this.width == 285 && this.height == 190) )
						if(this.width == 630 && this.height == 700) {
							if(this.width == 630 && this.height == 700) {
								if(jQuery('input[name="product_image_option"]').length > 0) {
									jQuery('input[name="product_image_option"]').val('1');
								}
							}

							/*if(this.width == 590 && this.height == 350) {
								if(jQuery('input[name="product_image_option"]').length > 0) {
									jQuery('input[name="product_image_option"]').val('1');
								}
							}
							else if(this.width == 285 && this.height == 190) {
								if(jQuery('input[name="product_image_option"]').length > 0) {
									jQuery('input[name="product_image_option"]').val('2');
								}
							}*/

                            jQuery("#"+field+"_preview").fadeIn("fast").attr('src',event.target.result);
                            var image_url = event.target.result;
                            var request = jQuery.ajax({ url: "image_upload.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});							
                            request.done(function(result) {
                                var msg = result;
                                jQuery('#'+field+'_cover .cover').html(msg);
                            });
                        }
                        else {
                            if(jQuery('div.alert').length > 0) {
								jQuery('div.alert').remove();
							}
							jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Upload image given required size</div>');
                        }
                    }
					else if(field == "home_thumbnails_image") {
                        if(this.width == 200 && this.height == 200) {
                            jQuery("#"+field+"_preview").fadeIn("fast").attr('src',event.target.result);
                            var image_url = event.target.result;
                            var request = jQuery.ajax({ url: "image_upload.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});							
                            request.done(function(result) {
                                var msg = result;
                                jQuery('#'+field+'_cover .cover').html(msg);
                            });
                        }
                        else {
                            if(jQuery('div.alert').length > 0) {
								jQuery('div.alert').remove();
							}
							jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Upload image given required size</div>');
                        }
                    }
					else if(field == "home_products_mobile_background_image") {
                        if(this.width == 540 && this.height == 800) {
                            jQuery("#"+field+"_preview").fadeIn("fast").attr('src',event.target.result);
                            var image_url = event.target.result;
                            var request = jQuery.ajax({ url: "image_upload.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});							
                            request.done(function(result) {
                                var msg = result;
                                jQuery('#'+field+'_cover .cover').html(msg);
                            });
                        }
                        else {
                            if(jQuery('div.alert').length > 0) {
								jQuery('div.alert').remove();
							}
							jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Upload image given required size</div>');
                        }
                    }
				}
			}
		}
		else {
			if(jQuery('div.alert').length > 0) {
				jQuery('div.alert').remove();
			}
			jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Image size is greater than 2MB</div>');
		}
		
	}
	else if(extFile=="pdf") {
		var width = ""; var height = "";		
		var reader = new FileReader();				
		reader.readAsDataURL(fileName);					
		reader.onload = function(event) {
			jQuery("#"+field+"_preview").fadeIn("fast").attr('src',event.target.result);
			var image_url = event.target.result;
			var request = jQuery.ajax({ url: "pdf_upload.php", type: "POST", data: {"image_url" : image_url, "image_type" : image_type, "field" : field}});							
			request.done(function(result) {
				var msg = result;
				jQuery('#'+field+'_cover .cover').html(msg);
			});
		}
	}
	else {
		if(jQuery('div.alert').length > 0) {
			jQuery('div.alert').remove();
		}
		jQuery('#'+field+'_cover .cover').before('<div class="alert alert-danger w-100 text-center">Please upload only PNG or JPG Format</div>');
	}
}

function delete_upload_image_before_save(obj, field, delete_image_file) {
	if(field == "category_thumbnail_image1" || field == "category_thumbnail_default_image1") {
		jQuery(obj).parent().html('<img src="../images/upload/categry_thumbnail_default_image1.jpg" style="max-width: 224px; max-height: 165px;" id="'+field+'_preview"/>');
	}
	else if(field == "category_thumbnail_image2" || field == "category_thumbnail_default_image2") {
		jQuery(obj).parent().html('<img src="../images/upload/categry_thumbnail_default_image2.jpg" style="max-width: 224px; max-height: 165px;" id="'+field+'_preview"/>');
	}
	else if(field == "category_thumbnail_image3" || field == "category_thumbnail_default_image3") {
		jQuery(obj).parent().html('<img src="../images/upload/categry_thumbnail_default_image3.jpg" style="max-width: 224px; max-height: 339px;" id="'+field+'_preview"/>');
	}
	else {
		jQuery(obj).parent().html('<img src="../images/upload_image.png" style="max-width: 150px;" id="'+field+'_preview"/>');
	}
}

function delete_multiple_files(obj, field) {
	if(field == "desktop_home_banner" || field == "mobile_home_banner" || field == "product_sub_image" || field == "home_products_slider_image") {
		jQuery(obj).parent().parent().remove();
	}
	else {
		jQuery(obj).parent().remove();
	}
}