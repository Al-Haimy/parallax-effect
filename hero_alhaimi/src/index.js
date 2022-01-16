wp.blocks.registerBlockType("ourplugin/are-you-paying-attention", {
  title: "Are you Paying Attention?",
  icon: "smilye",
  category: "common",
  attributes: {
    skyColor: { type: "string" },
    grassColor: { type: "string" },
  },
  edit: function (props) {
    function updateSkyColor(e) {
      props.setAttributes({ skyColor: e.target.value });
    }
    function updateGrassColor(e) {
      props.setAttributes({ grassColor: e.target.value });
    }
    return (
      <div>
        <input
          type="text"
          name=""
          placeholder="sky color"
          id=""
          onChange={updateSkyColor}
          value={props.attributes.skyColor}
        />
        <input
          type="text"
          name=""
          id=""
          placeholder="grass color"
          onChange={updateGrassColor}
          value={props.attributes.grassColor}
        />
      </div>
    );
  },
  save: function (props) {
    return (
      <>
        <h4>
          Today the Sky is{" "}
          <span className="skyColor">{props.attributes.skyColor}</span> and the
          grass is{" "}
          <span className="grassColor">{props.attributes.grassColor}</span>.
        </h4>
      </>
    );
  },
  deprecated: [
    {
      attributes: {
        skyColor: { type: "string" },
        grassColor: { type: "string" },
      },
      save: function (props) {
        return (
          <>
            <p>
              Today the Sky is{" "}
              <span className="skyColor">{props.attributes.skyColor}</span> and
              the grass is{" "}
              <span className="grassColor">{props.attributes.grassColor}</span>.
            </p>
          </>
        );
      },
    },
  ],
});
