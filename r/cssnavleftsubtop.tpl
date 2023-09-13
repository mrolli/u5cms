/*
This CSS formats the second (vertical) level of a split navigation.

If you want a split navigation, you have to

1: In PIDVESA's S, htmltemplate, switch the #navTop on

  <div id="navigationtop">
<div id="navTop"><a name="navigation"></a>{{{navigation}}}</div>
  </div>

by removing <!-- and -->

2: Also in htmltemplate, change

<div id="navLeft"><a name="navigation"></a>{{{navigation}}}</div>

to

<div id="navLeftSubTop"><a name="navigation"></a>{{{navigation}}}</div>

*/

#navLeftSubTop {
padding-top: 100px;
}

/* anchor styling */
#navLeftSubTop a {
display: none;
text-decoration: none;
color: #3F3F3F;
}

/* turn on visibility for second and subsequent levels only */
#navLeftSubTop li li a {
display: block;
}

#navLeftSubTop a:hover {
text-decoration: none;
color: black;
}

#navLeftSubTop li a.activeItem {
color: #e63320;
font-weight: bolder;
}

#navLeftSubTop li li a.activeItem {
color: #ff0000;
font-weight: bold;
}

/* list stylings */
#navLeftSubTop .inactive {
display: none;
padding-left: 7px;
}

#navLeftSubTop ul {
margin: 0;
padding: 0;
}

#navLeftSubTop li {
list-style-type: none;
margin: 0;
margin-left: 0;
border-bottom: none;
line-height: 0;
}

#navLeftSubTop li li {
padding: 0px 2px 0.1em 1em;
border-bottom: 1px solid #fff;
line-height: 1.6em;
}

#navLeftSubTop li li li {
font-size: 0.9em;
border-bottom: none;
}

#navLeftSubTop li.active {
color: #3F3F3F;
background-color: #f9f9f9;
}
