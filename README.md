# BM-Infinite-Scroll
A Craft CMS plugin to enhance your paginated content

## Installation

1. Move `infinitescroll` directory to `craft/plugins` directory
2. Install **Infinite Scroll** under **Craft Admin &rsaquo; Settings &rsaquo; Plugins**

## Parameters

There are several parameters you can use to control how the infinite scroll plugin behaves. These options are:

| Parameter         | Type      | Default                              | Description                                                       |
| ----------------- | :-------: | :----------------------------------: | ----------------------------------------------------------------- |
| containerSelector | string    | `null`                               | The parent container for the paginated items                      |
| itemSelector      | string    | `null`                               | The selector for the item                                         |
| loadingMessage    | string    | `"Loading more posts..."`              | The message to show when loading more items                       |
| loadingImage      | string    | `image`                              | The image to show when loading more items                         |
| finishedMessage   | string    | `"There are no more items to load"`    | The message to show when you reach the end of the item list       |

## User Guide

###1. Add infinite scrolling to your template

**The plugin requires jquery, so you must ensure that this library is loaded in order for infinite scrolling to work!**

Pass the paginate variable to the custom twig method `infinitescroll`, and specify the container selector as well as the item selector like so:

`{{ paginate|infinitescroll(containerSelector="#container", itemSelector="article.item") }}`

You can also pass any of the additional optional parameters also, like so:

`{{ paginate|infinitescroll(containerSelector="#container", itemSelector="article.item", finishedMessage="So Long, and Thanks for All the Fish") }}`

Here is a more in depth example, showing the instantiation of pagination on an entry channel and the integration of infinite scrolling:

    {% set entries = craft.entries.section('news').limit(1).order('postDate desc') %}

    <div id="left-main-content">
        {% paginate entries as entriesOnPage %}

            {% for entry in entriesOnPage %}
                <article class="news-row">
                    <h2>{{ entry.title }}</h2>
                    {{ entry.body }}
                </article>
            {% endfor %}

            {{ paginate|infinitescroll(containerSelector="#left-main-content", itemSelector="article.news-row") }}

        {% endpaginate %}
    </div>


# More plugins by Blue Mantis

... can be found [here](http://plugins.bluemantis.com/)


# License

The MIT License (MIT)

Copyright (c) <2015> <bluemantis.com>

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
