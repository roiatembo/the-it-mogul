/**
 * Callout block edit component.
 *
 * @package ItMogul
 */
import { __ } from "@wordpress/i18n";
import { InnerBlocks, RichText, useBlockProps } from "@wordpress/block-editor";
import type { BlockEditProps } from "@wordpress/blocks";

interface CalloutAttributes {
    title: string;
}

/**
 * Edit component rendered in the block editor.
 *
 * @param {BlockEditProps<CalloutAttributes>} props Block props.
 * @return {JSX.Element} The edit markup.
 */
export default function Edit({
    attributes,
    setAttributes,
}: BlockEditProps<CalloutAttributes>) {
    const blockProps = useBlockProps({
        className: "it-mogul-callout",
    });

    return (
        <div {...blockProps}>
            <RichText
                tagName="h3"
                className="it-mogul-callout__title"
                value={attributes.title}
                onChange={(title) => setAttributes({ title })}
                placeholder={__("Write a title…", "it-mogul")}
            />
            <div className="it-mogul-callout__content">
                <InnerBlocks
                    template={[
                        [
                            "core/paragraph",
                            {
                                placeholder: __(
                                    "Write the callout content…",
                                    "it-mogul",
                                ),
                            },
                        ],
                    ]}
                    templateLock={false}
                />
            </div>
        </div>
    );
}
