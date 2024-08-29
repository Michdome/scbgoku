<?php
// Function to extract domain links from Google search results
function extractDomainLinks($googleSearchLinks) {
    $results = array();

    foreach ($googleSearchLinks as $googleSearchLink) {
        $html = file_get_contents($googleSearchLink);
        $doc = new DOMDocument();
        @$doc->loadHTML($html);

        $links = $doc->getElementsByTagName('a');

        foreach ($links as $link) {
            $href = $link->getAttribute('href');
            if (strpos($href, '/url?q=') !== false) {
                $url = urldecode(explode('q=', $href)[1]);
                $domain = parse_url($url, PHP_URL_HOST);
                if ($domain) {
                    $results[] = $domain;
                }
            }
        }
    }

    return $results;
}

// Google search links
$googleSearchLinks = [
    "https://www.google.com/search?q=inurl%3Aproduct-category+intext%3Aaccessories%22&sca_esv=054ae6cb572344c8&sca_upv=1&source=hp&ei=8QN0ZuCDLtWx5NoPhp6Q4Ac&iflsig=AL9hbdgAAAAAZnQSAeqa0qfGnLWK2TYz5cEAmHfXaZeO&ved=0ahUKEwigwL6J_OmGAxXVGFkFHQYPBHwQ4dUDCBA&uact=5&oq=inurl%3Aproduct-category+intext%3Aaccessories%22&gs_lp=Egdnd3Mtd2l6IippbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDphY2Nlc3NvcmllcyJIl4EBUMAHWL5_cAR4AJABAJgBtAOgAa90qgEIMi0zLjM1Lja4AQPIAQD4AQGYAgugApUYqAIKwgIQEAAYAxjlAhjqAhiMAxiPAcICCxAuGIAEGLEDGIMBwgILEAAYgAQYsQMYgwHCAg4QABiABBixAxiDARiKBcICERAuGIAEGLEDGNEDGIMBGMcBwgIOEC4YgAQYsQMY0QMYxwHCAggQABiABBixA8ICCxAuGIAEGMcBGK8BwgIFEAAYgATCAg4QLhiABBixAxjHARivAcICBxAAGIAEGArCAgsQLhiABBixAxjUAsICDRAAGIAEGLEDGEYY-QHCAg0QABiABBixAxiDARgKmAMTkgcHMy4zLTUuM6AHmFA&sclient=gws-wiz#ip=1",
    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ARosewood&sca_esv=48ba93dfa23ac512&sca_upv=1&ei=9dtzZoXRFY-IptQPzqyrgAg&ved=0ahUKEwjFn7L41emGAxUPhIkEHU7WCoAQ4dUDCBI&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ARosewood&gs_lp=Egxnd3Mtd2l6LXNlcnAiNiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpSb3Nld29vZEgAUABYAHAAeAGQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ASerenity+Blue&sca_esv=1f8e575527f5ed36&source=hp&ei=BOVzZtjmFoGQwbkP8NOKkAU&iflsig=AL9hbdgAAAAAZnPzFIqFcZnrWNArBKaDMmoZ8tZpEZ7Z&ved=0ahUKEwjY-JfK3umGAxUBSDABHfCpAlIQ4dUDCBA&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ASerenity+Blue&gs_lp=Egdnd3Mtd2l6IjsiQXV0aG9yaXplLm5ldCIgaW51cmw6cHJvZHVjdC1jYXRlZ29yeSBpbnRleHQ6U2VyZW5pdHkgQmx1ZUjYH1AAWABwAHgAkAEAmAGzA6ABswOqAQM0LTG4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBy0&sclient=gws-wiz",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ATangerine&sca_esv=1f8e575527f5ed36&ei=kOVzZuChOq-SwbkPwrCbkAU&ved=0ahUKEwjgqZyN3-mGAxUvSTABHULYBlIQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ATangerine&gs_lp=Egxnd3Mtd2l6LXNlcnAiNyJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpUYW5nZXJpbmVIAFAAWABwAHgBkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp#ip=1",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AAlizarin&sca_esv=1f8e575527f5ed36&ei=F-ZzZs-yHdiVwbkPxfK_6Ao&ved=0ahUKEwiPmq_N3-mGAxXYSjABHUX5D60Q4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AAlizarin&gs_lp=Egxnd3Mtd2l6LXNlcnAiNiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpBbGl6YXJpbkjwB1D2AVj2AXABeACQAQCYAc8CoAHPAqoBAzMtMbgBA8gBAPgBAvgBAZgCAKACAJgDAIgGAZIHAKAHLQ&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ADrab&sca_esv=1f8e575527f5ed36&ei=VOZzZtyxIuGZwbkP2Kqa0A8&ved=0ahUKEwjcq7_q3-mGAxXhTDABHViVBvoQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ADrab&gs_lp=Egxnd3Mtd2l6LXNlcnAiMiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpEcmFiSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AJonquil&sca_esv=1f8e575527f5ed36&ei=k-ZzZracFIKZwt0Pj7ehKA&ved=0ahUKEwj2sbaI4OmGAxWCjLAFHY9bCAUQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AJonquil&gs_lp=Egxnd3Mtd2l6LXNlcnAiNSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpKb25xdWlsSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AKumquat&sca_esv=1f8e575527f5ed36&ei=rOZzZpHgMM2FwbkPseeWuAw&ved=0ahUKEwiR5siU4OmGAxXNQjABHbGzBccQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AKumquat&gs_lp=Egxnd3Mtd2l6LXNlcnAiNSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpLdW1xdWF0SABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ALiver&sca_esv=1f8e575527f5ed36&ei=w-ZzZsW7FoGKwbkP1oGLwAI&ved=0ahUKEwiFqaqf4OmGAxUBRTABHdbAAigQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ALiver&gs_lp=Egxnd3Mtd2l6LXNlcnAiMyJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpMaXZlckgAUABYAHAAeAGQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AMantis&sca_esv=1f8e575527f5ed36&ei=4eZzZv-QJd6qwbkP3NSxiA4&ved=0ahUKEwi_heCt4OmGAxVeVTABHVxqDOEQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AMantis&gs_lp=Egxnd3Mtd2l6LXNlcnAiNCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpNYW50aXNIAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ANavajo&sca_esv=1f8e575527f5ed36&ei=vehzZtv4MrSJwbkP7vuTmAM&ved=0ahUKEwiby-qQ4umGAxW0RDABHe79BDMQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ANavajo&gs_lp=Egxnd3Mtd2l6LXNlcnAiNCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpOYXZham9IAFAAWABwAHgBkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ANavajo+White&sca_esv=1f8e575527f5ed36&ei=2-hzZsueHoqbwbkPzICiiAo&ved=0ahUKEwiL-Pye4umGAxWKTTABHUyACKEQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ANavajo+White&gs_lp=Egxnd3Mtd2l6LXNlcnAiOiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpOYXZham8gV2hpdGVIAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ARazzmatazz&sca_esv=1f8e575527f5ed36&ei=COlzZqwOg4XBuQ_Kk4CgDA&ved=0ahUKEwisspm04umGAxWDQjABHcoJAMQQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ARazzmatazz&gs_lp=Egxnd3Mtd2l6LXNlcnAiOCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpSYXp6bWF0YXp6SABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ATawny&sca_esv=1f8e575527f5ed36&ei=G-lzZp7HAsWJwbkP-4uH-AI&ved=0ahUKEwjewKO94umGAxXFRDABHfvFAS8Q4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ATawny&gs_lp=Egxnd3Mtd2l6LXNlcnAiMyJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpUYXdueUgAUABYAHAAeACQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AUbe&sca_esv=1f8e575527f5ed36&ei=IulzZrizEvuJkvQP6c24sAk&ved=0ahUKEwi4zN7A4umGAxX7hIQIHekmDpYQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AUbe&gs_lp=Egxnd3Mtd2l6LXNlcnAiMSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpVYmVIAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AVerdigris&sca_esv=1f8e575527f5ed36&ei=L-lzZujUDuuYwbkP8sa86AM&ved=0ahUKEwioqPTG4umGAxVrTDABHXIjDz0Q4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AVerdigris&gs_lp=Egxnd3Mtd2l6LXNlcnAiNyJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpWZXJkaWdyaXNIAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AWine&sca_esv=1f8e575527f5ed36&ei=ROlzZr-qI76zkvQP2KmMuAg&ved=0ahUKEwi_3IrR4umGAxW-mYQIHdgUA4cQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AWine&gs_lp=Egxnd3Mtd2l6LXNlcnAiMiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpXaW5lSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AZircon&sca_esv=1f8e575527f5ed36&ei=Z-lzZrCQHc-uwbkPsMC7sAU&ved=0ahUKEwjw39zh4umGAxVPVzABHTDgDlYQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AZircon&gs_lp=Egxnd3Mtd2l6LXNlcnAiNCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpaaXJjb25IAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AAbsinthe&sca_esv=1f8e575527f5ed36&ei=cOlzZrXrBdnewbkPw_-pmAg&ved=0ahUKEwi14-rl4umGAxVZbzABHcN_CoMQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AAbsinthe&gs_lp=Egxnd3Mtd2l6LXNlcnAiNiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpBYnNpbnRoZUgAUABYAHAAeACQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ACordovan&sca_esv=1f8e575527f5ed36&ei=i-lzZteNIteSwbkPk_-hmAc&ved=0ahUKEwiX__by4umGAxVXSTABHZN_CHMQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ACordovan&gs_lp=Egxnd3Mtd2l6LXNlcnAiNiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpDb3Jkb3ZhbkgAUABYAHAAeACQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ADrizzle&sca_esv=1f8e575527f5ed36&ei=lOlzZpCoEKGSwbkPquu6IA&ved=0ahUKEwiQwor34umGAxUhSTABHaq1DgQQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ADrizzle&gs_lp=Egxnd3Mtd2l6LXNlcnAiNSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpEcml6emxlSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AMalachite&sca_esv=1f8e575527f5ed36&ei=IOpzZujeLrOFwbkPzZ-dgAc&ved=0ahUKEwjo7om64-mGAxWzQjABHc1PB3AQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AMalachite&gs_lp=Egxnd3Mtd2l6LXNlcnAiNyJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpNYWxhY2hpdGVIAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AAmethyst&sca_esv=1f8e575527f5ed36&ei=POpzZo-zH6nlkvQPmqug8Ak&ved=0ahUKEwiPwafH4-mGAxWpsoQIHZoVCJ4Q4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AAmethyst&gs_lp=Egxnd3Mtd2l6LXNlcnAiNiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpBbWV0aHlzdEgAUABYAHAAeACQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ABeryl&sca_esv=1f8e575527f5ed36&ei=QupzZumyM7SJwbkP7vuTmAM&ved=0ahUKEwjp26nK4-mGAxW0RDABHe79BDMQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ABeryl&gs_lp=Egxnd3Mtd2l6LXNlcnAiMyJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpCZXJ5bEgAUABYAHAAeACQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ACitron&sca_esv=1f8e575527f5ed36&ei=TepzZtW1KtqzkvQPlMi90Aw&ved=0ahUKEwiVkMDP4-mGAxXamYQIHRRkD8oQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ACitron&gs_lp=Egxnd3Mtd2l6LXNlcnAiNCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpDaXRyb25IAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ADelphinium&sca_esv=1f8e575527f5ed36&ei=ZOpzZt6QD_eIwbkPvMixqAM&ved=0ahUKEwje0qDa4-mGAxV3RDABHTxkDDUQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ADelphinium&gs_lp=Egxnd3Mtd2l6LXNlcnAiOCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpEZWxwaGluaXVtSABQAFgAcAB4AZABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AEmber&sca_esv=1f8e575527f5ed36&ei=rOpzZvnwOLb4wbkPqJyu6AM&ved=0ahUKEwj59vT84-mGAxU2fDABHSiOCz0Q4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AEmber&gs_lp=Egxnd3Mtd2l6LXNlcnAiMyJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpFbWJlckgAUABYAHAAeACQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AFrapp%C3%A9&sca_esv=1f8e575527f5ed36&ei=vepzZvGjFoPNwbkPrNyGkAk&ved=0ahUKEwix9t-E5OmGAxWDZjABHSyuAZIQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AFrapp%C3%A9&gs_lp=Egxnd3Mtd2l6LXNlcnAiNSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpGcmFwcMOpSABQAFgAcAB4AZABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AGlimmer&sca_esv=1f8e575527f5ed36&ei=yOpzZsDbC9mWwbkPzIuTsAM&ved=0ahUKEwjA3_SJ5OmGAxVZSzABHczFBDYQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AGlimmer&gs_lp=Egxnd3Mtd2l6LXNlcnAiNSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpHbGltbWVySABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AHoneysuckle&sca_esv=1f8e575527f5ed36&ei=1OpzZsHrPOn7wbkP7aOWkAU&ved=0ahUKEwjBpYKQ5OmGAxXpfTABHe2RBVIQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AHoneysuckle&gs_lp=Egxnd3Mtd2l6LXNlcnAiOSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpIb25leXN1Y2tsZUgAUABYAHAAeACQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AIcicle&sca_esv=1f8e575527f5ed36&ei=qetzZpmXKbSOwbkPzZOwyA4&ved=0ahUKEwjZj7f15OmGAxU0RzABHc0JDOkQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AIcicle&gs_lp=Egxnd3Mtd2l6LXNlcnAiNCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpJY2ljbGVIAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AJasper&sca_esv=1f8e575527f5ed36&ei=tutzZr-aEOL7wbkP1N2huAc&ved=0ahUKEwi_zbf75OmGAxXifTABHdRuCHcQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AJasper&gs_lp=Egxnd3Mtd2l6LXNlcnAiNCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpKYXNwZXJIAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ALuminescent&sca_esv=1f8e575527f5ed36&ei=2OtzZuDXBNyawbkPze65iAM&ved=0ahUKEwjgo8eL5emGAxVcTTABHU13DjEQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ALuminescent&gs_lp=Egxnd3Mtd2l6LXNlcnAiOSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpMdW1pbmVzY2VudEgAUABYAHAAeACQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AMarigold&sca_esv=1f8e575527f5ed36&ei=4utzZtWLGLCQwbkPsIaJgAk&ved=0ahUKEwjVhL2Q5emGAxUwSDABHTBDApAQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AMarigold&gs_lp=Egxnd3Mtd2l6LXNlcnAiNiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpNYXJpZ29sZEgAUABYAHAAeAGQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ANebula&sca_esv=1f8e575527f5ed36&ei=8-tzZpKwN5mNwbkP8pmAqA8&ved=0ahUKEwjS9emY5emGAxWZRjABHfIMAPUQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ANebula&gs_lp=Egxnd3Mtd2l6LXNlcnAiNCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpOZWJ1bGFIAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AOnyx&sca_esv=1f8e575527f5ed36&ei=A-xzZtjQDK_fwbkP1Zq2sAM&ved=0ahUKEwiY3o-g5emGAxWvbzABHVWNDTYQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AOnyx&gs_lp=Egxnd3Mtd2l6LXNlcnAiMiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpPbnl4SABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3APonderosa&sca_esv=1f8e575527f5ed36&ei=FOxzZqV2l5XBuQ_ChLPgAg&ved=0ahUKEwil0JGo5emGAxWXSjABHULCDCwQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3APonderosa&gs_lp=Egxnd3Mtd2l6LXNlcnAiNyJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpQb25kZXJvc2FIAFAAWABwAHgBkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3APine&sca_esv=1f8e575527f5ed36&ei=JOxzZvkn5vnBuQ-p3ab4Bg&ved=0ahUKEwj5yeGv5emGAxXmfDABHamuCW8Q4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3APine&gs_lp=Egxnd3Mtd2l6LXNlcnAiMiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpQaW5lSABQAFgAcAB4AZABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3APonderosa+Pine&sca_esv=1f8e575527f5ed36&ei=YexzZpubFPuJkvQP6c24sAk&ved=0ahUKEwjbz4DN5emGAxX7hIQIHekmDpYQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3APonderosa+Pine&gs_lp=Egxnd3Mtd2l6LXNlcnAiPCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpQb25kZXJvc2EgUGluZUgAUABYAHAAeAGQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AQuasar&sca_esv=1f8e575527f5ed36&ei=b-xzZv3zNYaxwt0PqrKr8A4&ved=0ahUKEwi95_jT5emGAxWGmLAFHSrZCu4Q4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AQuasar&gs_lp=Egxnd3Mtd2l6LXNlcnAiNCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpRdWFzYXJIAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ARadiant&sca_esv=1f8e575527f5ed36&ei=f-xzZqS2GJqIwbkP94SFkAY&ved=0ahUKEwjk8avb5emGAxUaRDABHXdCAWIQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ARadiant&gs_lp=Egxnd3Mtd2l6LXNlcnAiNSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpSYWRpYW50SABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AOrchid&sca_esv=1f8e575527f5ed36&ei=jOxzZvbCEpidwbkPpe20EA&ved=0ahUKEwj2uL_h5emGAxWYTjABHaU2DQIQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AOrchid&gs_lp=Egxnd3Mtd2l6LXNlcnAiNCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpPcmNoaWRIAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ARadiant+Orchid&sca_esv=1f8e575527f5ed36&ei=nOxzZo_eAdaxkvQP7sWSkAU&ved=0ahUKEwiPnP_o5emGAxXWmIQIHe6iBFIQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ARadiant+Orchid&gs_lp=Egxnd3Mtd2l6LXNlcnAiPCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpSYWRpYW50IE9yY2hpZEgAUABYAHAAeACQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ASaffron&sca_esv=1f8e575527f5ed36&ei=puxzZsGHNrSOwbkP2sisuAY&ved=0ahUKEwjB8pXu5emGAxU0RzABHVokC2cQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ASaffron&gs_lp=Egxnd3Mtd2l6LXNlcnAiNSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpTYWZmcm9uSABQAFgAcAB4AZABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ATwilight&sca_esv=1f8e575527f5ed36&ei=texzZpvJNeGSwt0PsP-0uAE&ved=0ahUKEwjb96j15emGAxVhibAFHbA_DRcQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ATwilight&gs_lp=Egxnd3Mtd2l6LXNlcnAiNiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpUd2lsaWdodEgAUABYAHAAeACQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ATwilight+Blue&sca_esv=1f8e575527f5ed36&ei=v-xzZqC1JOuwkvQPtfWb4A4&ved=0ahUKEwjgkPr55emGAxVrmIQIHbX6BuwQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ATwilight+Blue&gs_lp=Egxnd3Mtd2l6LXNlcnAiOyJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpUd2lsaWdodCBCbHVlSABQAFgAcAB4AZABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AWhiskey&sca_esv=1f8e575527f5ed36&ei=4uxzZv66GriIkvQP8KegmAM&ved=0ahUKEwj-s8iK5umGAxU4hIQIHfATCDMQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AWhiskey&gs_lp=Egxnd3Mtd2l6LXNlcnAiNSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpXaGlza2V5SABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AXenon&sca_esv=1f8e575527f5ed36&ei=6OxzZt63Ou7Pwt0Pgcqf2As&ved=0ahUKEwjey9aN5umGAxXup7AFHQHlB7sQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AXenon&gs_lp=Egxnd3Mtd2l6LXNlcnAiMyJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpYZW5vbkgAUABYAHAAeACQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AYule&sca_esv=1f8e575527f5ed36&ei=8uxzZqGlOoKWwbkP-_G8mAI&ved=0ahUKEwih5riS5umGAxUCSzABHfs4DyMQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AYule&gs_lp=Egxnd3Mtd2l6LXNlcnAiMiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpZdWxlSMwLUMsFWMsFcAJ4AJABAJgBwgKgAcICqgEDMy0xuAEDyAEA-AEC-AEBmAIAoAIAmAMAiAYBkgcAoAct&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AZephyr&sca_esv=1f8e575527f5ed36&ei=AO1zZqizHcSqwbkPhP-_oA4&ved=0ahUKEwios_KY5umGAxVEVTABHYT_D-QQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AZephyr&gs_lp=Egxnd3Mtd2l6LXNlcnAiNCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpaZXBoeXJIAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AZephyr+Blue&sca_esv=1f8e575527f5ed36&ei=F-1zZo6WIJGVwbkPy_6E2AI&ved=0ahUKEwjO_fCj5umGAxWRSjABHUs_ASsQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AZephyr+Blue&gs_lp=Egxnd3Mtd2l6LXNlcnAiOSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpaZXBoeXIgQmx1ZUgAUABYAHAAeACQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ACinnabar&sca_esv=1f8e575527f5ed36&ei=K-1zZu7sLoqbwbkPzICiiAo&ved=0ahUKEwiursSt5umGAxWKTTABHUyACKEQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ACinnabar&gs_lp=Egxnd3Mtd2l6LXNlcnAiNiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpDaW5uYWJhckgAUABYAHAAeAGQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ADenali&sca_esv=1f8e575527f5ed36&ei=Oe1zZtHID8KuwbkPw8-syA0&ved=0ahUKEwiRyfuz5umGAxVCVzABHcMnC9kQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ADenali&gs_lp=Egxnd3Mtd2l6LXNlcnAiNCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpEZW5hbGlIAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AEvening&sca_esv=1f8e575527f5ed36&ei=Se1zZqGcDbjhwbkPrMaBwA4&ved=0ahUKEwjh5Mm75umGAxW4cDABHSxjAOgQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AEvening&gs_lp=Egxnd3Mtd2l6LXNlcnAiNSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpFdmVuaW5nSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3APrimrose&sca_esv=1f8e575527f5ed36&ei=ZO1zZsGWG_GGwbkPkqC2yA0&ved=0ahUKEwjB2MfI5umGAxVxQzABHRKQDdkQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3APrimrose&gs_lp=Egxnd3Mtd2l6LXNlcnAiNiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpQcmltcm9zZUgAUABYAHAAeACQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AEvening+Primrose&sca_esv=1f8e575527f5ed36&ei=cO1zZtjuOtKPwbkPhLCTiA8&ved=0ahUKEwjY5sPO5umGAxXSRzABHQTYBPEQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AEvening+Primrose&gs_lp=Egxnd3Mtd2l6LXNlcnAiPiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpFdmVuaW5nIFByaW1yb3NlSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AFrangipani&sca_esv=1f8e575527f5ed36&ei=ie1zZsePELmFwbkPs7Sp0AE&ved=0ahUKEwiH-I7a5umGAxW5QjABHTNaChoQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AFrangipani&gs_lp=Egxnd3Mtd2l6LXNlcnAiOCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpGcmFuZ2lwYW5pSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AHigh&sca_esv=1f8e575527f5ed36&ei=le1zZoa1KOSKwbkPxJW6oAU&ved=0ahUKEwjG04Pg5umGAxVkRTABHcSKDlQQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AHigh&gs_lp=Egxnd3Mtd2l6LXNlcnAiMiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpIaWdoSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3Aland&sca_esv=1f8e575527f5ed36&ei=oO1zZsHJC9aRwbkP5NiE0AE&ved=0ahUKEwjBmYbl5umGAxXWSDABHWQsARoQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3Aland&gs_lp=Egxnd3Mtd2l6LXNlcnAiMiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpsYW5kSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AHighland&sca_esv=1f8e575527f5ed36&ei=rO1zZpSmE6-YwbkPg6GRkAU&ved=0ahUKEwiUrOrq5umGAxUvTDABHYNQBFIQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AHighland&gs_lp=Egxnd3Mtd2l6LXNlcnAiNiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpIaWdobGFuZEgAUABYAHAAeAGQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AIllusion&sca_esv=1f8e575527f5ed36&ei=t-1zZvnmDvWPwbkPrK-x8AE&ved=0ahUKEwi5noXw5umGAxX1RzABHaxXDB4Q4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AIllusion&gs_lp=Egxnd3Mtd2l6LXNlcnAiNiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpJbGx1c2lvbkgAUABYAHAAeAGQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AJute&sca_esv=1f8e575527f5ed36&ei=we1zZrDPDsSXwbkPkeeSsAU&ved=0ahUKEwjws-f05umGAxXESzABHZGzBFYQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AJute&gs_lp=Egxnd3Mtd2l6LXNlcnAiMiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpKdXRlSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ALagoon&sca_esv=1f8e575527f5ed36&ei=E-5zZojvG5iEwbkPuPyCoAc&ved=0ahUKEwjIxIGc5-mGAxUYQjABHTi-AHQQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ALagoon&gs_lp=Egxnd3Mtd2l6LXNlcnAiNCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpMYWdvb25IAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AMystic&sca_esv=1f8e575527f5ed36&ei=Gu5zZp2_CbeSwt0PwPauoAs&ved=0ahUKEwidtJqf5-mGAxU3ibAFHUC7C7QQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AMystic&gs_lp=Egxnd3Mtd2l6LXNlcnAiNCJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpNeXN0aWNIAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ANapa&sca_esv=1f8e575527f5ed36&ei=OO5zZvNBj5LBuQ_fgbjACg&ved=0ahUKEwjzvbit5-mGAxUPSTABHd8ADqgQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ANapa&gs_lp=Egxnd3Mtd2l6LXNlcnAiMiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpOYXBhSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAJgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AOrinoco&sca_esv=1f8e575527f5ed36&ei=P-5zZrJrv_rBuQ-d05-gDA&ved=0ahUKEwjyhuSw5-mGAxU_fTABHZ3pB8QQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AOrinoco&gs_lp=Egxnd3Mtd2l6LXNlcnAiNSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpPcmlub2NvSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3APrairie&sca_esv=1f8e575527f5ed36&ei=Tu5zZsi-H8-kwbkPl8uLkA8&ved=0ahUKEwjInZa45-mGAxVPUjABHZflAvIQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3APrairie&gs_lp=Egxnd3Mtd2l6LXNlcnAiNSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpQcmFpcmllSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ASand&sca_esv=1f8e575527f5ed36&ei=We5zZsXQKa-SwbkPwrCbkAU&ved=0ahUKEwiF4b-95-mGAxUvSTABHULYBlIQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ASand&gs_lp=Egxnd3Mtd2l6LXNlcnAiMiJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpTYW5kSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AQuetzal&sca_esv=1f8e575527f5ed36&ei=fu5zZrTvMd2JwbkP9rWwgAQ&ved=0ahUKEwi0pprP5-mGAxXdRDABHfYaDEAQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3AQuetzal&gs_lp=Egxnd3Mtd2l6LXNlcnAiNSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpRdWV0emFsSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ARosette&sca_esv=1f8e575527f5ed36&ei=o-5zZpqIDu6JkvQPkIWI0AE&ved=0ahUKEwja5cjg5-mGAxXuhIQIHZACAhoQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ARosette&gs_lp=Egxnd3Mtd2l6LXNlcnAiNSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpSb3NldHRlSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ACitrine&sca_esv=1f8e575527f5ed36&ei=we5zZv_HFp6HkvQPyuaX0AY&ved=0ahUKEwi_rPju5-mGAxWeg4QIHUrzBWoQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ACitrine&gs_lp=Egxnd3Mtd2l6LXNlcnAiNSJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpDaXRyaW5lSABQAFgAcAB4AJABAJgBAKABAKoBALgBA8gBAPgBAvgBAZgCAKACAJgDAJIHAKAHAA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ADrift&sca_esv=1f8e575527f5ed36&ei=x-5zZv-oDMqNwbkPndCgoAQ&ved=0ahUKEwi_qNzx5-mGAxXKRjABHR0oCEQQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ADrift&gs_lp=Egxnd3Mtd2l6LXNlcnAiMyJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpEcmlmdEgAUABYAHAAeACQAQCYAQCgAQCqAQC4AQPIAQD4AQL4AQGYAgCgAgCYAwCSBwCgBwA&sclient=gws-wiz-serp",
//    
//    "https://www.google.com/search?q=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ADriftwood&sca_esv=1f8e575527f5ed36&ei=4O5zZtyMLuGzwt0PwtevgA4&ved=0ahUKEwjc_PP95-mGAxXhmbAFHcLrC-AQ4dUDCBE&uact=5&oq=%22Authorize.net%22+inurl%3Aproduct-category+intext%3ADriftwood&gs_lp=Egxnd3Mtd2l6LXNlcnAiNyJBdXRob3JpemUubmV0IiBpbnVybDpwcm9kdWN0LWNhdGVnb3J5IGludGV4dDpEcmlmdHdvb2RIAFAAWABwAHgAkAEAmAEAoAEAqgEAuAEDyAEA-AEC-AEBmAIAoAIAmAMAkgcAoAcA&sclient=gws-wiz-serp",
    // Add more Google search links here
];

// Extract domain links
$domainLinks = extractDomainLinks($googleSearchLinks);

// Display domain links
echo "<ul>";
foreach ($domainLinks as $domain) {
    echo "<li>$domain</li>";
}
echo "</ul>";
?>