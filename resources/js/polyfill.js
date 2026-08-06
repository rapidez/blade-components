import "invokers-polyfill"

if (!(typeof HTMLElement !== 'undefined' && typeof HTMLElement.prototype === 'object' && 'popover' in HTMLElement.prototype))
{
    function replacePopovers(baseElement) {
        function replacePopover(el, newCommand) {
            let target = el.getAttribute('popovertarget') ?? el.getAttribute('commandfor')
            el.removeAttribute('popovertargetaction')
            el.removeAttribute('popovertarget')
            el.setAttribute('commandfor', target)
            el.setAttribute('command', newCommand)
        }

        baseElement.querySelectorAll('[command=show-popover]').forEach(el => el.command = 'show-modal')
        baseElement.querySelectorAll('[command=toggle-popover]').forEach(el => el.command = 'show-modal')
        baseElement.querySelectorAll('[command=hide-popover]').forEach(el => el.command = 'close')

        baseElement.querySelectorAll('[popovertargetaction=show]').forEach(el => replacePopover(el, 'show-modal'))
        baseElement.querySelectorAll('[popovertargetaction=toggle]').forEach(el => replacePopover(el, 'show-modal'))
        baseElement.querySelectorAll('[popovertargetaction=hide]').forEach(el => replacePopover(el, 'close'))
    }

    replacePopovers(document)

    const observer = new MutationObserver((mutations) => {
        if (mutations.some((mutation) =>
            mutation.target.hasAttribute('popovertargetaction')
            || mutation.target.hasAttribute('popovertarget')
            || mutation.target.hasAttribute('commandfor')
        )) {
            replacePopovers(mutation.target.parentElement ?? document)
        }
    })

    observer.observe(document, {
        attributes: true,
        childList: true,
        subtree: true,
        attributeFilter: ['popovertargetaction', 'popovertarget', 'command']
    })
}
